package app.sapnachaudhary2018.fragments;


import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.SearchView;
import android.util.AttributeSet;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Date;

import app.sapnachaudhary2018.Config;
import app.sapnachaudhary2018.DetailsActivity;
import app.sapnachaudhary2018.R;
import app.sapnachaudhary2018.adapters.VideoPostAdapter;
import app.sapnachaudhary2018.helper.DBHelper;
import app.sapnachaudhary2018.interfaces.OnItemClickListener;
import app.sapnachaudhary2018.models.YoutubeDataModel;
import decoration.ItemOffsetDecoration;

/**
 * A simple {@link Fragment} subclass.
 */
public class FavouriteFragment extends Fragment implements
        SearchView.OnQueryTextListener,  MenuItem.OnActionExpandListener{



    private static String GOOGLE_YOUTUBE_API_KEY = Config.YOUTUBE_API_KEY;//here you should use your api key for testing purpose you can use this api also
    private static String videoID = "hU0T-tUdD-A";//here you should use your playlist id for testing purpose you can use this api also
    private static String CHANNLE_GET_URL = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" + videoID + "&maxResults=130&key=" + GOOGLE_YOUTUBE_API_KEY + "";
    private static String VIDEO_GET_URL = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" + videoID
            + GOOGLE_YOUTUBE_API_KEY + "";


    public void refreshFragmentUI(Fragment fragment) {
        getFragmentManager()
                .beginTransaction()
                .detach(fragment)
                .attach(fragment)
                .commit();
    }

    private InterstitialAd interstitial;
    private YoutubeDataModel youtubeDataModel;
    private RecyclerView mList_videos = null;
    private VideoPostAdapter adapter = null;
    private ArrayList<YoutubeDataModel> mListData = new ArrayList<>();
    private ProgressBar pb;
    private TextView tvFav;
    private  SharedPreferences sharedpreferences;
    public static final String MyPREFERENCES = "MyPrefs" ;
    public static final int MAX_CLICLK = 5;
    public FavouriteFragment() {
        // Required empty public constructor
    }


    @Override
    public void setUserVisibleHint(boolean isVisibleToUser) {
        super.setUserVisibleHint(isVisibleToUser);
        Log.d("App: visible","Updating beacaue its visible");
        if(adapter!=null)
            getFragmentManager().beginTransaction().detach(this).attach(this).commit();
    }
//
    @Override
    public void onResume() {
        Log.d("App: fav","Onresume");
        if(adapter!=null)
        {
            new RequestYoutubeAPI().execute();
            adapter.notifyDataSetChanged();
        }
        super.onResume();
    }



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        Log.d("App: fav","App: fav Loading");
        View view = inflater.inflate(R.layout.fragment_fav_list, container, false);
        mList_videos = (RecyclerView) view.findViewById(R.id.mList_videos);
        pb = (ProgressBar) view.findViewById(R.id.progressBar);
        tvFav = (TextView) view.findViewById(R.id.textViewFav);

        ItemOffsetDecoration itemDecoration = new ItemOffsetDecoration(container.getContext(), R.dimen.item_offst);
        mList_videos.addItemDecoration(itemDecoration);
        mList_videos.setItemAnimator(new DefaultItemAnimator());

        setHasOptionsMenu(true);

        sharedpreferences = this.getActivity().getSharedPreferences(MyPREFERENCES, Context.MODE_PRIVATE);


        initList(mListData);

        new RequestYoutubeAPI().execute();
        return view;
    }


    public void displayInterstitial() {
    // If Ads are loaded, show Interstitial else show nothing.
        if (interstitial.isLoaded()) {
            interstitial.show();
        }
    }

    private void initList(ArrayList<YoutubeDataModel> mListData) {
        mList_videos.setLayoutManager(new LinearLayoutManager(getActivity()));
        adapter = new VideoPostAdapter(getActivity(), mListData, new OnItemClickListener() {
            @Override
            public void onItemClick(YoutubeDataModel item) {

                //ads here
                AdRequest adRequest = new AdRequest.Builder().build();

                // Prepare the Interstitial Ad
                interstitial = new InterstitialAd(getContext());
                // Insert the Ad Unit ID
                interstitial.setAdUnitId(getString(R.string.admob_test_interstitial_id));

                interstitial.loadAd(adRequest);

                youtubeDataModel = item;

                if(interstitial.isLoading()){
                    pb.setVisibility(View.VISIBLE);
                }


                // Prepare an Interstitial Ad Listener
                interstitial.setAdListener(new AdListener() {
                    public void onAdLoaded() {
                        Log.d("Adss","calling onLoaded displayInterstitial");
                        // Call displayInterstitial() function
                        pb.setVisibility(View.GONE);
                        SharedPreferences.Editor editor = sharedpreferences.edit();
                        //here check the counter for threshold value
                        SimpleDateFormat formatter = new SimpleDateFormat("dd/MM/yyyy");
                        Date date = new Date();
                        String currentDate = formatter.format(date);

                        if(!sharedpreferences.contains("date")){
                            editor.putString("date", currentDate);
                           // Toast.makeText(getActivity(), "Setting date", Toast.LENGTH_LONG).show();
                            editor.commit();
                        }
                        if(!sharedpreferences.contains("count")){
                         //   Toast.makeText(getActivity(), "Setting count", Toast.LENGTH_LONG).show();
                            editor.putInt("count",0);
                            editor.commit();
                        }

                        //now sharedpreference contains both
                        if(!sharedpreferences.getString("date","date").equals(currentDate)){
                            //not equal to current date so set and set count as 0
                            editor.putString("date",currentDate);
                            editor.putInt("count",0);
                            editor.commit();
                            displayInterstitial();
                        }else{
                            //date is already present, check for counter
                            if(sharedpreferences.getInt("count",0) == MAX_CLICLK ){
                                //then directly pass to another activity
                                try{
                                    Intent intent = new Intent(getActivity(), DetailsActivity.class);
                                    intent.putExtra(YoutubeDataModel.class.toString(), youtubeDataModel);
                                    startActivity(intent);
                                }catch (Exception e){
                                    Log.d("Adds", Arrays.toString(e.getStackTrace()));
                                }
                            }else{
                                //increase count and show ad
                                displayInterstitial();
                            }
                        }


                        //show this if user has not reached threshold else don't show this
                    }

                    @Override
                    public void onAdFailedToLoad(int errorCode) {
                        Log.d("Adds","Add Failed to load "+errorCode);
                        //open activity once ad is seen by user
                        pb.setVisibility(View.GONE);
                        Intent intent = new Intent(getActivity(), DetailsActivity.class);
                        intent.putExtra(YoutubeDataModel.class.toString(), youtubeDataModel);
                        startActivity(intent);
                    }

                    @Override
                    public void onAdLeftApplication() {
                        int count = sharedpreferences.getInt("count",0);
                        SharedPreferences.Editor editor = sharedpreferences.edit();
                        editor.putInt("count",++count);
                        Log.d("Adds","Add Clicked "+count);
                        // Toast.makeText(getActivity(), "Clicked "+count, Toast.LENGTH_LONG).show();
                        editor.commit();
                    }

                    @Override
                    public void onAdOpened() {
                        Log.d("Adds","Add Opened");
                    }

                    @Override
                    public void onAdClosed() {
                        // Load the next interstitial. we don't need this as we are building new request each time
                        // interstitial.loadAd(new AdRequest.Builder().build());
                        Log.d("Adds","Ad closed, open details activity");
                        //open activity once ad is seen by user
                        try{
                            Intent intent = new Intent(getActivity(), DetailsActivity.class);
                            intent.putExtra(YoutubeDataModel.class.toString(), youtubeDataModel);
                            startActivity(intent);
                        }catch (Exception e){
                            Log.d("Adds", Arrays.toString(e.getStackTrace()));
                        }
                    }
                });
                /*YoutubeDataModel youtubeDataModel = item;
                Intent intent = new Intent(getActivity(), DetailsActivity.class);
                intent.putExtra(YoutubeDataModel.class.toString(), youtubeDataModel);
                startActivity(intent);*/
            }
        });
        mList_videos.setAdapter(adapter);

    }


    //create an asynctask to get all the data from youtube
    private class RequestYoutubeAPI extends AsyncTask<Void, String, String> {

        ArrayList<String> videoList = new ArrayList<>();
        @Override
        protected void onPreExecute() {
            pb.setVisibility(View.VISIBLE);
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(Void... params) {

            DBHelper dbHelper = new DBHelper(getContext());
            Cursor cursor = null;

            try {
                cursor = dbHelper.getData();
                while (cursor.moveToNext()) {
                    String videoID = cursor.getString(1);
                    videoList.add(videoID);
                    Log.d("App: VSQID",videoID);
                }
            }catch (Exception e){
                e.printStackTrace();
            }
            finally {
                if(cursor!=null)
                    cursor.close();
            }

            String videoIDs = android.text.TextUtils.join(",", videoList);
            VIDEO_GET_URL = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=" + videoIDs
                    + "&key=" +GOOGLE_YOUTUBE_API_KEY + "";
            Log.d("App: CSV",videoIDs);
            HttpClient httpClient = new DefaultHttpClient();
            HttpGet httpGet = new HttpGet(VIDEO_GET_URL);
            Log.e("App: URL", VIDEO_GET_URL);
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
            if(videoList.isEmpty()){
                tvFav.setVisibility(View.VISIBLE);
            }else{
                tvFav.setVisibility(View.GONE);
            }
            pb.setVisibility(View.GONE);
            if (response != null) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    Log.e("response videoList", jsonObject.toString());
                    mListData = parseVideoListFromResponse(jsonObject);
                    initList(mListData);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
    }



    public ArrayList<YoutubeDataModel> parseVideoListFromResponse(JSONObject jsonObject) {
        ArrayList<YoutubeDataModel> mList = new ArrayList<>();


            try {
                JSONArray jsonArray = jsonObject.getJSONArray("items");
                for (int i = 0; i < jsonArray.length(); i++) {
                    JSONObject json = jsonArray.getJSONObject(i);
                    if (json.has("kind")) {
                        if (json.getString("kind").equals("youtube#video")) {
                            YoutubeDataModel youtubeObject = new YoutubeDataModel();
                            JSONObject jsonSnippet = json.getJSONObject("snippet");
                            String vedio_id = json.getString("id");
                            if (jsonSnippet.has("resourceId")) {
                                JSONObject jsonResource = jsonSnippet.getJSONObject("resourceId");
                                vedio_id = jsonResource.getString("videoId");

                            }
                            String title = jsonSnippet.getString("title");
                            String description = jsonSnippet.getString("description");
                            String publishedAt = jsonSnippet.getString("publishedAt");
                            String thumbnail = jsonSnippet.getJSONObject("thumbnails").getJSONObject(Config.THUMBNAIL_QUALITY).getString("url");


                            publishedAt = publishedAt.substring(0,10);

                            youtubeObject.setTitle(title);

                            youtubeObject.setDescription(description);
                            youtubeObject.setPublishedAt(publishedAt);
                            youtubeObject.setThumbnail(thumbnail);
                            youtubeObject.setVideo_id(vedio_id);
                            mList.add(youtubeObject);

                        }
                    }


                }
            } catch (JSONException e) {
                e.printStackTrace();
            }


        return mList;

    }


    @Override
    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
        inflater.inflate(R.menu.main, menu);

        Log.d("App:","Called in fragment to intialize menu");

        final MenuItem item = menu.findItem(R.id.action_search);
        final SearchView searchView = (SearchView) item.getActionView();
        searchView.setOnQueryTextListener(this);

        super.onCreateOptionsMenu(menu, inflater);
    }

    @Override
    public boolean onQueryTextChange(String newText) {
        Log.d("App:","Query text changed");
        final ArrayList<YoutubeDataModel> filteredModelList = filter(mListData, newText);
        adapter.setFilter(filteredModelList);
        return true;
    }

    @Override
    public boolean onQueryTextSubmit(String query) {
        return true;
    }

    private ArrayList<YoutubeDataModel> filter(ArrayList<YoutubeDataModel> models, String query) {
        query = query.toLowerCase();final ArrayList<YoutubeDataModel> filteredModelList = new ArrayList<>();
        for (YoutubeDataModel model : models) {
            final String text = model.getTitle().toLowerCase();
            if (text.contains(query)) {
                filteredModelList.add(model);
            }
        }
        return filteredModelList;
    }

    @Override
    public boolean onMenuItemActionExpand(MenuItem item) {
        return true;
    }

    @Override
    public boolean onMenuItemActionCollapse(MenuItem item) {
        return true;
    }

}