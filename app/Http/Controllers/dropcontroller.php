<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use App\taluka;
use App\video;
use Illuminate\Support\Facades\Session;

class dropcontroller extends Controller
{
    public function index(){
    	$district=district::get();
    	return view('signup',compact('district'));
    } 


    public function youtube(){

    	$video1=video::orderBy('created_at', 'desc')->first();
    	// echo $video1;
        
    	$title= $video1->title;
    	$description= $video1->description;
    	$tags= $video1->tags;
    	$filename= $video1->file_name;
    	$vid= $video1->id;


    	$oauthClientID     = '109016393963-ha11kq6kub17s0tk8nl5fh9p2tp5139t.apps.googleusercontent.com';
        $oauthClientSecret = 'W356QkYvz3Bd9qPG_8hr86yO';
        $baseURL           = 'http://localhost:8000/youtube';
        $redirectURL       = 'http://localhost:8000/youtube';

        define('OAUTH_CLIENT_ID',$oauthClientID);
        define('OAUTH_CLIENT_SECRET',$oauthClientSecret);
        define('REDIRECT_URL',$redirectURL);
        define('BASE_URL',$baseURL);

        require_once '/vendor/autoload.php'; 
            

        $client = new \Google_Client();
        $client->setClientId(OAUTH_CLIENT_ID);
        $client->setClientSecret(OAUTH_CLIENT_SECRET);
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $client->setRedirectUri(REDIRECT_URL);

        $youtube = new \Google_Service_YouTube($client);

        $tokenSessionKey = 'token-' . $client->prepareScopes();

        if (isset($_GET['code'])) {
          if (strval($_GET['state']) !== strval($_GET['state'])) {
            die('The session state did not match.');

          }

          $client->authenticate($_GET['code']);
          $_SESSION[$tokenSessionKey] = $client->getAccessToken();
          header('Location: ' . REDIRECT_URL);
        }

        if (isset($_SESSION[$tokenSessionKey])) {
          $client->setAccessToken($_SESSION[$tokenSessionKey]);
        }

if ($client->getAccessToken()) {
  
  try{
    // REPLACE this value with the path to the file you are uploading.
    $videoPath = 'video/'.$filename;
    
    if($video1->youtube_video_id!='0'){
        // Uploaded video data
        $videoTitle = $title;
        $videoDesc = $description;
        $videoTags = $tags;
        $videoId = $video1->youtube_video_id;
    }else{
        // Create a snippet with title, description, tags and category ID
        // Create an asset resource and set its snippet metadata and type.
        // This example sets the video's title, description, keyword tags, and
        // video category.
        $snippet = new \Google_Service_YouTube_VideoSnippet();
        $snippet->setTitle($title);
        $snippet->setDescription($description);
        $snippet->setTags(explode(",",$tags));
    
        // Numeric video category. See
        // https://developers.google.com/youtube/v3/docs/videoCategories/list
        $snippet->setCategoryId("22");
    
        // Set the video's status to "public". Valid statuses are "public",
        // "private" and "unlisted".
        $status = new \Google_Service_YouTube_VideoStatus();
        $status->privacyStatus = "public";
    
        // Associate the snippet and status objects with a new video resource.
        $video = new \Google_Service_YouTube_Video();
        $video->setSnippet($snippet);
        $video->setStatus($status);
    
        // Specify the size of each chunk of data, in bytes. Set a higher value for
        // reliable connection as fewer chunks lead to faster uploads. Set a lower
        // value for better recovery on less reliable connections.
        $chunkSizeBytes = 1 * 1024 * 1024;
    
        // Setting the defer flag to true tells the client to return a request which can be called
        // with ->execute(); instead of making the API call immediately.
        $client->setDefer(true);
    
        // Create a request for the API's videos.insert method to create and upload the video.
        $insertRequest = $youtube->videos->insert("status,snippet", $video);
    
        // Create a MediaFileUpload object for resumable uploads.
        $media = new \Google_Http_MediaFileUpload(
            $client,
            $insertRequest,
            'video/*',
            null,
            true,
            $chunkSizeBytes
        );
        $media->setFileSize(filesize($videoPath));
    
    
        // Read the media file and upload it chunk by chunk.
        $status = false;
        $handle = fopen($videoPath, "rb");
        while (!$status && !feof($handle)) {
          $chunk = fread($handle, $chunkSizeBytes);
          $status = $media->nextChunk($chunk);
        }
        fclose($handle);
    
        // If you want to make other calls after the file upload, set setDefer back to false
        $client->setDefer(false);
        
        // Update youtube video id to database
        //$db->update($videoData['id'], $status['id']);
        
        // Delete video file from local server
        //@unlink("videos/sample.mp4");
        
        // uploaded video data
        $videoTitle = $status['snippet']['title'];
        $videoDesc = $status['snippet']['description'];
        //$videoTags = implode(",",$status['snippet']['tags']);
        $videoId = $status['id'];
        video::where('id',$vid)->update(['youtube_video_id'=>$videoId]);

        return redirect('/upload?err=1');
    }
    
    
    

   } catch (Google_Service_Exception $e) {
       
   } catch (Google_Exception $e) {
        
   }

      $_SESSION[$tokenSessionKey] = $client->getAccessToken();
} elseif (OAUTH_CLIENT_ID == '') {
      
} else {
  // If the user hasn't authorized the app, initiate the OAuth flow

      $state = mt_rand();
      $client->setState($state);
      $_SESSION['state'] = $state;

      $authUrl = $client->createAuthUrl();
      $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
    echo $htmlBody;
  

    }    
        
    }
}
