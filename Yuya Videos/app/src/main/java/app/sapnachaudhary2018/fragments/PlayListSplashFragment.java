package app.sapnachaudhary2018.fragments;


import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.SearchView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;

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
import app.sapnachaudhary2018.MainActivity;
import app.sapnachaudhary2018.PlaylistActivity;
import app.sapnachaudhary2018.R;
import app.sapnachaudhary2018.adapters.PlaylistAdapter;
import app.sapnachaudhary2018.adapters.VideoPostAdapter;
import app.sapnachaudhary2018.interfaces.OnItemClickListener;
import app.sapnachaudhary2018.interfaces.OnItemClickListenerPlaylist;
import app.sapnachaudhary2018.models.PlaylistModel;
import app.sapnachaudhary2018.models.YoutubeDataModel;
import decoration.ItemOffsetDecoration;

/**
 * A simple {@link Fragment} subclass.
 */
public class PlayListSplashFragment extends Fragment implements  SearchView.OnQueryTextListener,  MenuItem.OnActionExpandListener{



    private static String GOOGLE_YOUTUBE_API_KEY = Config.YOUTUBE_API_KEY;//here you should use your api key for testing purpose you can use this api also
    private  String PLAYLIST_ID = "PL_mlupJ4yJIhmXRzCmdN_1IXcwvBGyUpj";//here you should use your playlist id for testing purpose you can use this api also
    private  String CHANNLE_GET_URL = "https://www.googleapis.com/youtube/v3/playlists?part=snippet&id=" + PLAYLIST_ID + "&key=" + GOOGLE_YOUTUBE_API_KEY + "";


    private InterstitialAd interstitial;
    private String nextPageToken="";
    private boolean isFirstLoad = true;
    private boolean isLoading = false;
    private PlaylistAdapter playlistAdapter;
    private PlaylistModel playlistModel;
    private RecyclerView mList_videos = null;
    private PlaylistAdapter adapter = null;
    private ArrayList<PlaylistModel> mListData = new ArrayList<>();
    private ProgressBar pb;
    private  SharedPreferences sharedpreferences;
    public static final String MyPREFERENCES = "MyPrefs" ;
    public static final int MAX_CLICLK = 5;
    public PlayListSplashFragment() {
        // Required empty public constructor
    }

    public static PlayListSplashFragment newInstance(String id) {
        PlayListSplashFragment fragment = new PlayListSplashFragment();
        Bundle args = new Bundle();
        args.putString("id", id);
        Log.d("App: id",id);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_play_list, container, false);
        mList_videos = (RecyclerView) view.findViewById(R.id.mList_videos);
        PLAYLIST_ID = getArguments().getString("id");

        CHANNLE_GET_URL = "https://www.googleapis.com/youtube/v3/playlists?part=snippet&id=" + PLAYLIST_ID + "&key=" + GOOGLE_YOUTUBE_API_KEY + "";
        Log.d("Dekho",CHANNLE_GET_URL);
        pb = (ProgressBar) view.findViewById(R.id.progressBar);
        ItemOffsetDecoration itemDecoration = new ItemOffsetDecoration(container.getContext(), R.dimen.item_offst);
        mList_videos.addItemDecoration(itemDecoration);
        mList_videos.setItemAnimator(new DefaultItemAnimator());

        setHasOptionsMenu(true);

        mList_videos.addOnScrollListener(new RecyclerView.OnScrollListener() {
            @Override
            public void onScrollStateChanged(RecyclerView recyclerView, int newState) {
                super.onScrollStateChanged(recyclerView, newState);

                if (!recyclerView.canScrollVertically(1) && !isLoading) {
                    Log.d("App: Calling","Calling RequestYoutubeAPI()"+adapter.getItemCount()+" - "+mListData.size());
                    new RequestYoutubeAPI().execute();
                }
            }
        });

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

    private void initList(ArrayList<PlaylistModel> mListData) {
        mList_videos.setLayoutManager(new LinearLayoutManager(getActivity()));
        adapter = new PlaylistAdapter(getActivity(), mListData, new OnItemClickListenerPlaylist() {

            @Override
            public void onItemClick(PlaylistModel item) {

                //ads here
                AdRequest adRequest = new AdRequest.Builder().build();
                playlistModel = item;
                // Prepare the Interstitial Ad
                interstitial = new InterstitialAd(getContext());
                // Insert the Ad Unit ID
                interstitial.setAdUnitId(getString(R.string.admob_test_interstitial_id));

                Intent intent = new Intent(getActivity(), PlaylistActivity.class);
                intent.putExtra(PlaylistModel.class.toString(), playlistModel);
                startActivity(intent);

            }
        });
        mList_videos.setAdapter(adapter);

    }


    //create an asynctask to get all the data from youtube
    private class RequestYoutubeAPI extends AsyncTask<Void, String, String> {
        @Override
        protected void onPreExecute() {
            isLoading = true;
            pb.setVisibility(View.VISIBLE);
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(Void... params) {
            Log.d("App: async","ASYNC Task Called.");
            HttpClient httpClient = new DefaultHttpClient();
            HttpGet httpGet;
            if(!nextPageToken.equals("")){
                String appendString = "&pageToken="+nextPageToken;
                httpGet = new HttpGet(CHANNLE_GET_URL+appendString);
                Log.e("URL", CHANNLE_GET_URL+appendString);
            }else if(isFirstLoad)
            {
                httpGet = new HttpGet(CHANNLE_GET_URL);
                Log.e("URL", CHANNLE_GET_URL);
            }else
                return null;


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
            pb.setVisibility(View.GONE);
            if (response != null) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    Log.e("response", jsonObject.toString());
                    mListData.addAll(parseVideoListFromResponse(jsonObject));
                    if(isFirstLoad){
                        isFirstLoad = false;
                        initList(mListData);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
            isLoading = false;
        }
    }

    public ArrayList<PlaylistModel> parseVideoListFromResponse(JSONObject jsonObject) {
        ArrayList<PlaylistModel> mList = new ArrayList<>();

        if (jsonObject.has("items")) {
            try {
                if(!jsonObject.has("nextPageToken")){
                    //now it does not contain nextPageToken means it has prevPageToken - so it's last page
                    nextPageToken = "";
                    Log.d("App: prevPageToken ","Setting nextPageToken Blank");
                }else{
                    nextPageToken = jsonObject.getString("nextPageToken");
                    Log.d("App: nextPageToken ",""+nextPageToken);
                }
                JSONArray jsonArray = jsonObject.getJSONArray("items");
                for (int i = 0; i < jsonArray.length(); i++) {
                    JSONObject json = jsonArray.getJSONObject(i);
                    if (json.has("kind")) {
                        if (json.getString("kind").equals("youtube#playlist")) {
                            PlaylistModel youtubeObject = new PlaylistModel();
                            JSONObject jsonSnippet = json.getJSONObject("snippet");
                            String vedio_id = "";
                            if (json.has("id")) {
                                vedio_id = json.getString("id");

                            }
                            String title = jsonSnippet.getString("title");
                            String description = jsonSnippet.getString("description");
                            String publishedAt = jsonSnippet.getString("publishedAt");
                            String thumbnail = jsonSnippet.getJSONObject("thumbnails").getJSONObject(Config.THUMBNAIL_QUALITY).getString("url");

                            Log.d("dekho",title+" a ");
                            Log.d("dekho",vedio_id+" b ");
                            publishedAt = publishedAt.substring(0,10);

                            youtubeObject.setTitle(title);

                            youtubeObject.setDescription(description);
                            youtubeObject.setPublishedAt(publishedAt);
                            youtubeObject.setThumbnail(thumbnail);
                            youtubeObject.setPlaylistID(vedio_id);
                            mList.add(youtubeObject);

                        }
                    }

                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        return mList;

    }


    @Override
    public void onCreateOptionsMenu(Menu menu, MenuInflater inflater) {
        inflater.inflate(R.menu.main, menu);

        Log.d("App:","PS Called in fragment to intialize menu");

        final MenuItem item = menu.findItem(R.id.action_search);
        final SearchView searchView = (SearchView) item.getActionView();
        searchView.setOnQueryTextListener(this);

        super.onCreateOptionsMenu(menu, inflater);
    }

    @Override
    public boolean onQueryTextChange(String newText) {
        Log.d("App:","Query text changed");
        final ArrayList<PlaylistModel> filteredModelList = filter(mListData, newText);
        adapter.setFilter(filteredModelList);
        return true;
    }

    @Override
    public boolean onQueryTextSubmit(String query) {
        return true;
    }

    private ArrayList<PlaylistModel> filter(ArrayList<PlaylistModel> models, String query) {
        query = query.toLowerCase();final ArrayList<PlaylistModel> filteredModelList = new ArrayList<>();
        for (PlaylistModel model : models) {
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
