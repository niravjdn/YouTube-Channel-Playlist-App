package app.sapnachaudhary2018.adapters;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

import app.sapnachaudhary2018.R;
import app.sapnachaudhary2018.interfaces.OnItemClickListener;
import app.sapnachaudhary2018.interfaces.OnItemClickListenerPlaylist;
import app.sapnachaudhary2018.models.PlaylistModel;
import app.sapnachaudhary2018.models.YoutubeDataModel;

/**
 * Created by mdmunirhossain on 12/18/17.
 */

public class PlaylistAdapter extends RecyclerView.Adapter<PlaylistAdapter.YoutubePostHolder> {

    private ArrayList<PlaylistModel> dataSet;
    private Context mContext = null;
    private final OnItemClickListenerPlaylist listener;


    public PlaylistAdapter(Context mContext, ArrayList<PlaylistModel> dataSet, OnItemClickListenerPlaylist listener) {
        this.dataSet = dataSet;
        this.mContext = mContext;
        this.listener = listener;

    }

    @Override
    public YoutubePostHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.youtube_post_layout,parent,false);
        YoutubePostHolder postHolder = new YoutubePostHolder(view);
        return postHolder;
    }

    @Override
    public void onBindViewHolder(YoutubePostHolder holder, int position) {



        //set the views here
        TextView textViewTitle = holder.textViewTitle;
        TextView textViewDes = holder.textViewDes;
        TextView textViewDate = holder.textViewDate;
        ImageView ImageThumb = holder.ImageThumb;

        PlaylistModel object = dataSet.get(position);

        textViewTitle.setText(object.getTitle());
        textViewDes.setText(object.getDescription());
        textViewDate.setText(object.getPublishedAt());
        holder.bind(dataSet.get(position), listener);

        //TODO: image will be downloaded from url
        Picasso.with(mContext).load(object.getThumbnail()).into(ImageThumb);



    }

    @Override
    public int getItemCount() {
        return dataSet.size();
    }

    public static class YoutubePostHolder extends RecyclerView.ViewHolder {
        TextView textViewTitle;
        TextView textViewDes;
        TextView textViewDate;
        ImageView ImageThumb;

        public YoutubePostHolder(View itemView) {
            super(itemView);
            this.textViewTitle = (TextView) itemView.findViewById(R.id.textViewTitle);
            this.textViewDes = (TextView) itemView.findViewById(R.id.textViewDes);
            this.textViewDate = (TextView) itemView.findViewById(R.id.textViewDate);
            this.ImageThumb = (ImageView) itemView.findViewById(R.id.ImageThumb);

        }

        public void bind(final PlaylistModel item, final OnItemClickListenerPlaylist listener) {
            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Log.d("Listener","Called video on click listner");
                    listener.onItemClick(item);
                }
            });
        }
    }

    public void setFilter(ArrayList<PlaylistModel> countryModels) {
        dataSet = new ArrayList<>();
        dataSet.addAll(countryModels);
        notifyDataSetChanged();
    }

}
