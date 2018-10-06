package com.ristana.status_video.adapter;

/**
 * Created by hsn on 30/09/2017.
 */

import android.app.Activity;
import android.support.v7.widget.RecyclerView;
import android.util.TypedValue;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.ristana.status_video.R;
import com.ristana.status_video.entity.Language;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;


/**
 * Created by hsn on 16/09/2017.
 */

public class LanguageAdapter extends RecyclerView.Adapter implements SelectableViewHolder.OnItemSelectedListener {

    private final List<Language> mValues;
    private boolean isMultiSelectionEnabled = false;
    SelectableViewHolder.OnItemSelectedListener listener;
    Activity activity;
    public LanguageAdapter( SelectableViewHolder.OnItemSelectedListener listener,
                              List<Language> items,boolean isMultiSelectionEnabled,Activity activity) {
        this.listener = listener;
        this.isMultiSelectionEnabled = isMultiSelectionEnabled;
        this.activity=activity;
        mValues = new ArrayList<>();
        for (Language item : items) {
            mValues.add(item);
        }
    }

    @Override
    public SelectableViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.item_language, parent, false);

        return new SelectableViewHolder(itemView, this);
    }

    @Override
    public void onBindViewHolder(RecyclerView.ViewHolder viewHolder, int position) {

        SelectableViewHolder holder = (SelectableViewHolder) viewHolder;
        Language selectableItem = mValues.get(position);
        String name = selectableItem.getLanguage();
        holder.textView.setText(name);

        Picasso.with(activity.getApplicationContext()).load(selectableItem.getImage()).error(R.drawable.flag_placeholder).placeholder(R.drawable.flag_placeholder).into(holder.image_view_iten_language);

        if (isMultiSelectionEnabled) {
            TypedValue value = new TypedValue();
            holder.textView.getContext().getTheme().resolveAttribute(android.R.attr.listChoiceIndicatorMultiple, value, true);
            int checkMarkDrawableResId = value.resourceId;
            holder.textView.setCheckMarkDrawable(checkMarkDrawableResId);
        } else {
            TypedValue value = new TypedValue();
            holder.textView.getContext().getTheme().resolveAttribute(android.R.attr.listChoiceIndicatorSingle, value, true);
            int checkMarkDrawableResId = value.resourceId;
            holder.textView.setCheckMarkDrawable(checkMarkDrawableResId);
        }

        holder.mItem = selectableItem;
        holder.setChecked(holder.mItem.isSelected());
    }

    @Override
    public int getItemCount() {
        return mValues.size();
    }

    public List<Language> getSelectedItems() {

        List<Language> selectedItems = new ArrayList<>();
        for (Language item : mValues) {
            if (item.isSelected()) {
                selectedItems.add(item);
            }
        }
        return selectedItems;
    }

    @Override
    public int getItemViewType(int position) {
        if(isMultiSelectionEnabled){
            return SelectableViewHolder.MULTI_SELECTION;
        }
        else{
            return SelectableViewHolder.SINGLE_SELECTION;
        }
    }

    @Override
    public void onItemSelected(Language item) {
        if (item.getId() == 0){
            for (Language selectableItem : mValues) {
                selectableItem.setSelected(false);
            }

            mValues.get(0).setSelected(true);
            notifyDataSetChanged();

        }else{
            mValues.get(0).setSelected(false);
            if (!isMultiSelectionEnabled) {

                for (Language selectableItem : mValues) {
                    if (!selectableItem.equals(item) && selectableItem.isSelected()) {
                        selectableItem.setSelected(false);
                    } else if (selectableItem.equals(item)  && item.isSelected()) {
                        selectableItem.setSelected(true);
                    }
                }
                notifyDataSetChanged();
            }
            notifyDataSetChanged();

        }
        Boolean nullable = true;
        for (Language selectableItem : mValues) {
            if (selectableItem.isSelected()) {
                nullable= false;
            }
        }
        if (nullable){
            for (Language selectableItem : mValues) {
                selectableItem.setSelected(false);
            }

            mValues.get(0).setSelected(true);
            notifyDataSetChanged();
        }
        listener.onItemSelected(item);

    }
}