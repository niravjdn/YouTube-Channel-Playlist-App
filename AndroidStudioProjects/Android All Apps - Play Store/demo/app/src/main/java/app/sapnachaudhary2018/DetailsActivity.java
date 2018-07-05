package app.sapnachaudhary2018;

import android.Manifest;
import android.app.Activity;
import android.app.Fragment;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.content.pm.PackageManager;
import android.content.res.Configuration;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.support.v4.app.ActivityCompat;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.util.SparseArray;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ToggleButton;

import com.google.android.youtube.player.YouTubeBaseActivity;
import com.google.android.youtube.player.YouTubeInitializationResult;
import com.google.android.youtube.player.YouTubePlayer;
import com.google.android.youtube.player.YouTubePlayerView;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;

import app.sapnachaudhary2018.R;
import app.sapnachaudhary2018.adapters.CommentAdapter;
import app.sapnachaudhary2018.helper.DBHelper;
import app.sapnachaudhary2018.models.YoutubeCommentModel;
import app.sapnachaudhary2018.models.YoutubeDataModel;
import at.huber.youtubeExtractor.YouTubeUriExtractor;
import at.huber.youtubeExtractor.YtFile;

public class DetailsActivity extends YouTubeBaseActivity implements
        YouTubePlayer.OnInitializedListener{
    private static final int READ_STORAGE_PERMISSION_REQUEST_CODE = 1;
    private static String GOOGLE_YOUTUBE_API = Config.YOUTUBE_API_KEY;
    private YoutubeDataModel youtubeDataModel = null;
    TextView textViewName;
    TextView textViewDes;
    TextView textViewDate;
    private  boolean isFullScreen = false;
    // ImageView imageViewIcon;
    public static final String VIDEO_ID = "c2UNv38V6y4";
    private YouTubePlayerView mYoutubePlayerView = null;
    private YouTubePlayer mYoutubePlayer = null;
    private ImageView playButton = null;
    private ArrayList<YoutubeCommentModel> mListData = new ArrayList<>();
    private CommentAdapter mAdapter = null;
    private RecyclerView mList_videos = null;
    private ToggleButton favBtn;
    private DBHelper mDatabaseHelper;

    @Override
    public void onConfigurationChanged(Configuration newConfig) {
        super.onConfigurationChanged(newConfig);
        Log.d("App:","Configuration Changed");
        if (newConfig.orientation == Configuration.ORIENTATION_LANDSCAPE) {
            mYoutubePlayer.setFullscreen(true);
        } else if (newConfig.orientation == Configuration.ORIENTATION_PORTRAIT){
           mYoutubePlayer.setFullscreen(false);
        }
    }



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);




        youtubeDataModel = getIntent().getParcelableExtra(YoutubeDataModel.class.toString());
        Log.e("APP:Youtube Data Model", youtubeDataModel.getDescription());

        mYoutubePlayerView = (YouTubePlayerView) findViewById(R.id.youtube_player);
        mYoutubePlayerView.initialize(GOOGLE_YOUTUBE_API, this);

        playButton = (ImageView) findViewById(R.id.playButton);


        //check if already fav then add to red color
        favBtn = (ToggleButton) findViewById(R.id.fav_btn);
        mDatabaseHelper = new DBHelper(this);
        //checking
        if(mDatabaseHelper.checkIsDataAlreadyInDBorNot(youtubeDataModel.getVideo_id())){
            favBtn.setChecked(true);
        }

        textViewName = (TextView) findViewById(R.id.textViewName);
        textViewDes = (TextView) findViewById(R.id.textViewDes);
        // imageViewIcon = (ImageView) findViewById(R.id.imageView);
        textViewDate = (TextView) findViewById(R.id.textViewDate);

        textViewName.setText(youtubeDataModel.getTitle());
        textViewDes.setText(youtubeDataModel.getDescription());
        textViewDate.setText(youtubeDataModel.getPublishedAt());

        mList_videos = (RecyclerView) findViewById(R.id.mList_videos);

        this.favBtn.setOnCheckedChangeListener( new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton toggleButton, boolean isChecked) {
                //MainActivity.updateList();
                if(!isChecked){
                    addToFav(false);
                }else{
                    addToFav(true);
                }
            }
        }) ;

        new RequestYoutubeCommentAPI().execute();
//        try {
//            if (youtubeDataModel.getThumbnail() != null) {
//                if (youtubeDataModel.getThumbnail().startsWith("http")) {
//                    Picasso.with(this)
//                            .load(youtubeDataModel.getThumbnail())
//                            .into(imageViewIcon);
//                }
//            }
//        } catch (Exception e) {
//            e.printStackTrace();
//        }

        if (!checkPermissionForReadExtertalStorage()) {
            try {
                requestPermissionForReadExtertalStorage();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }

    }

    public void back_btn_pressed(View view) {
        finish();
    }

//    public void playVideo(View view) {
//        if (mYoutubePlayer != null) {
//            if (mYoutubePlayer.isPlaying())
//                mYoutubePlayer.pause();
//            else
//                mYoutubePlayer.play();
//        }
//    }


    @Override
    public void onInitializationSuccess(YouTubePlayer.Provider provider, final YouTubePlayer youTubePlayer, boolean wasRestored) {
        youTubePlayer.setPlayerStateChangeListener(playerStateChangeListener);
        youTubePlayer.setPlaybackEventListener(playbackEventListener);
        Log.d("App:","Intializing youtube player");
        if (!wasRestored) {
            youTubePlayer.cueVideo(youtubeDataModel.getVideo_id());
        }

        int fullScreenFlags = youTubePlayer.getFullscreenControlFlags();
        fullScreenFlags &= ~YouTubePlayer.FULLSCREEN_FLAG_ALWAYS_FULLSCREEN_IN_LANDSCAPE;
        Log.d("App:","FullScreenFlag"+fullScreenFlags);
        //system ui do to portrail when rotate back
        // | to add
        //youTubePlayer.setFullscreenControlFlags(fullScreenFlags);
        youTubePlayer.addFullscreenControlFlag(YouTubePlayer.FULLSCREEN_FLAG_ALWAYS_FULLSCREEN_IN_LANDSCAPE);
        fullScreenFlags &= ~YouTubePlayer.FULLSCREEN_FLAG_CONTROL_ORIENTATION;

        //test with control UI

        youTubePlayer.setOnFullscreenListener(new YouTubePlayer.OnFullscreenListener() {

            @Override
            public void onFullscreen(boolean _isFullScreen) {
                Log.d("App:","Onfullscreen listener called");
                isFullScreen = _isFullScreen;
            }
        });



        mYoutubePlayer = youTubePlayer;

    }

    @Override
    public void onBackPressed() {
        Log.d("Ap:","isFullScreen "+isFullScreen);
        if (isFullScreen){
            mYoutubePlayer.pause();
            mYoutubePlayer.setFullscreen(false);
        }
        else{
            super.onBackPressed();
        }
    }


    @Override
    public void onInitializationFailure(YouTubePlayer.Provider provider, YouTubeInitializationResult youTubeInitializationResult) {
        if (youTubeInitializationResult.isUserRecoverableError()) {
            youTubeInitializationResult.getErrorDialog(this, 1).show();
        } else {
            String error = "Error initializing YouTube player:  " + youTubeInitializationResult.toString();
            Toast.makeText(this, error, Toast.LENGTH_LONG).show();
        }
        Toast.makeText(getApplicationContext(), "This app require youtube app on your device. If it is there, open it and the use the app.",
                Toast.LENGTH_LONG).show();
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == 1) {
            // Retry initialization if user performed a recovery action
            mYoutubePlayerView.initialize(Config.YOUTUBE_API_KEY, this);
        }
    }

    private YouTubePlayer.PlaybackEventListener playbackEventListener = new YouTubePlayer.PlaybackEventListener() {
        @Override
        public void onPlaying() {
            playButton.setVisibility(View.GONE);
        }

        @Override
        public void onPaused() {
            playButton.setVisibility(View.VISIBLE);
        }

        @Override
        public void onStopped() {

        }

        @Override
        public void onBuffering(boolean b) {

        }

        @Override
        public void onSeekTo(int i) {

        }
    };

    private YouTubePlayer.PlayerStateChangeListener playerStateChangeListener = new YouTubePlayer.PlayerStateChangeListener() {
        @Override
        public void onLoading() {

        }

        @Override
        public void onLoaded(String s) {
            playButton.setVisibility(View.GONE);
            mYoutubePlayer.play();
        }

        @Override
        public void onAdStarted() {
            playButton.setVisibility(View.GONE);
        }

        @Override
        public void onVideoStarted() {
            playButton.setVisibility(View.GONE);
        }

        @Override
        public void onVideoEnded() {

        }

        @Override
        public void onError(YouTubePlayer.ErrorReason errorReason) {

        }
    };


    public void play_btn_pressed(View view) {
        mYoutubePlayer.play();
        playButton.setVisibility(View.GONE);
        Intent sendIntent = new Intent();

    }




    public void addToFav(boolean isInsertion) {
        String videoId  = youtubeDataModel.getVideo_id();
        if(isInsertion){
            boolean b = mDatabaseHelper.addFav(videoId);
            if(b){
                Toast.makeText(this,"Added to favourite.", Toast.LENGTH_SHORT).show();
            }else{
                Toast.makeText(this,"Error while adding to favourite.", Toast.LENGTH_SHORT).show();
            }
        }else{
            mDatabaseHelper.deleteFav(videoId);
            Toast.makeText(this,"Removed From favourite.", Toast.LENGTH_SHORT).show();
        }

    }




    public void share_btn_pressed(View view) {
        Intent sendIntent = new Intent();

        sendIntent.setAction(Intent.ACTION_SEND);
        String link = ("https://www.youtube.com/watch?v=" + youtubeDataModel.getVideo_id());
        link += "\n Shared using Sapna Chaudhary Dance Application. Download it here : \n" + getString(R.string.applink);
        // this is the text that will be shared
        sendIntent.putExtra(Intent.EXTRA_TEXT, link);
        sendIntent.putExtra(Intent.EXTRA_SUBJECT, youtubeDataModel.getTitle()
                + "Share");

        sendIntent.setType("text/plain");
        startActivity(Intent.createChooser(sendIntent, "share"));
    }

    public void downloadVideo(View view) {
        //get the download URL
        String youtubeLink = ("https://www.youtube.com/watch?v=" + youtubeDataModel.getVideo_id());
        YouTubeUriExtractor ytEx = new YouTubeUriExtractor(this) {
            @Override
            public void onUrisAvailable(String videoID, String videoTitle, SparseArray<YtFile> ytFiles) {
                if (ytFiles != null) {
                    int itag = 22;
                    //This is the download URL
                    String downloadURL = ytFiles.get(itag).getUrl();
                    Log.e("download URL :", downloadURL);

                    //now download it like a file
                    new RequestDownloadVideoStream().execute(downloadURL, videoTitle);


                }

            }
        };

        ytEx.execute(youtubeLink);
    }

    private ProgressDialog pDialog;


    private class RequestDownloadVideoStream extends AsyncTask<String, String, String> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(DetailsActivity.this);
            pDialog.setMessage("Downloading file. Please wait...");
            pDialog.setIndeterminate(false);
            pDialog.setMax(100);
            pDialog.setProgressStyle(ProgressDialog.STYLE_HORIZONTAL);
            pDialog.setCancelable(false);
            pDialog.show();
        }

        @Override
        protected String doInBackground(String... params) {
            InputStream is = null;
            URL u = null;
            int len1 = 0;
            int temp_progress = 0;
            int progress = 0;
            try {
                u = new URL(params[0]);
                is = u.openStream();
                URLConnection huc = (URLConnection) u.openConnection();
                huc.connect();
                int size = huc.getContentLength();

                if (huc != null) {
                    String file_name = params[1] + ".mp4";
                    String storagePath = Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_DOWNLOADS)+"/YoutubeVideos";
                    File f = new File(storagePath);
                    if (!f.exists()) {
                        f.mkdir();
                    }

                    FileOutputStream fos = new FileOutputStream(f+"/"+file_name);
                    byte[] buffer = new byte[1024];
                    int total = 0;
                    if (is != null) {
                        while ((len1 = is.read(buffer)) != -1) {
                            total += len1;
                            // publishing the progress....
                            // After this onProgressUpdate will be called
                            progress = (int) ((total * 100) / size);
                            if(progress >= 0) {
                                temp_progress = progress;
                                publishProgress("" + progress);
                            }else
                                publishProgress("" + temp_progress+1);

                            fos.write(buffer, 0, len1);
                        }
                    }

                    if (fos != null) {
                        publishProgress("" + 100);
                        fos.close();
                    }
                }
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            } finally {
                if (is != null) {
                    try {
                        is.close();
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                }
            }
            return null;
        }

        @Override
        protected void onProgressUpdate(String... values) {
            super.onProgressUpdate(values);
            pDialog.setProgress(Integer.parseInt(values[0]));
        }

        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            if (pDialog.isShowing())
                pDialog.dismiss();
        }
    }


    private class RequestYoutubeCommentAPI extends AsyncTask<Void, String, String> {

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(Void... params) {
            String VIDEO_COMMENT_URL = "https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&maxResults=100&videoId=" + youtubeDataModel.getVideo_id() + "&key=" + GOOGLE_YOUTUBE_API;
            HttpClient httpClient = new DefaultHttpClient();
            HttpGet httpGet = new HttpGet(VIDEO_COMMENT_URL);
            Log.e("url: ", VIDEO_COMMENT_URL);
            try {
                HttpResponse response = httpClient.execute(httpGet);
                HttpEntity httpEntity = response.getEntity();
                String json = EntityUtils.toString(httpEntity);
                return json;
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }

        @Override
        protected void onPostExecute(String response) {
            super.onPostExecute(response);
            if (response != null) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    Log.e("response", jsonObject.toString());
                    mListData = parseJson(jsonObject);
                    initVideoList(mListData);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
    }

    public void initVideoList(ArrayList<YoutubeCommentModel> mListData) {
        mList_videos.setLayoutManager(new LinearLayoutManager(this));
        mAdapter = new CommentAdapter(this, mListData);
        mList_videos.setAdapter(mAdapter);
    }

    public ArrayList<YoutubeCommentModel> parseJson(JSONObject jsonObject) {
        ArrayList<YoutubeCommentModel> mList = new ArrayList<>();

        if (jsonObject.has("items")) {
            try {
                JSONArray jsonArray = jsonObject.getJSONArray("items");
                for (int i = 0; i < jsonArray.length(); i++) {
                    JSONObject json = jsonArray.getJSONObject(i);

                    YoutubeCommentModel youtubeObject = new YoutubeCommentModel();
                    JSONObject jsonTopLevelComment = json.getJSONObject("snippet").getJSONObject("topLevelComment");
                    JSONObject jsonSnippet = jsonTopLevelComment.getJSONObject("snippet");

                    String title = jsonSnippet.getString("authorDisplayName");
                    String thumbnail = jsonSnippet.getString("authorProfileImageUrl");
                    String comment = jsonSnippet.getString("textDisplay");

                    youtubeObject.setTitle(title);
                    youtubeObject.setComment(comment);
                    youtubeObject.setThumbnail(thumbnail);
                    mList.add(youtubeObject);


                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        return mList;

    }

    public void requestPermissionForReadExtertalStorage() throws Exception {
        try {
            ActivityCompat.requestPermissions((Activity) this, new String[]{Manifest.permission.READ_EXTERNAL_STORAGE, Manifest.permission.WRITE_EXTERNAL_STORAGE},
                    READ_STORAGE_PERMISSION_REQUEST_CODE);
        } catch (Exception e) {
            e.printStackTrace();
            throw e;
        }
    }

    public boolean checkPermissionForReadExtertalStorage() {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
            int result = this.checkSelfPermission(Manifest.permission.READ_EXTERNAL_STORAGE);
            int result2 = this.checkSelfPermission(Manifest.permission.WRITE_EXTERNAL_STORAGE);

            return (result == PackageManager.PERMISSION_GRANTED && result2 == PackageManager.PERMISSION_GRANTED);
        }
        return false;
    }

    public void AddData(String newEntry) {
        boolean insertData = mDatabaseHelper.addData(newEntry);

        if (insertData) {
            Toast.makeText(this,"Data Successfully Inserted!", Toast.LENGTH_SHORT).show();
        } else {

            Toast.makeText(this,"Something went wrong", Toast.LENGTH_SHORT).show();
        }
    }
}
