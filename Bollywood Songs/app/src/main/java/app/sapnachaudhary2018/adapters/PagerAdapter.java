package app.sapnachaudhary2018.adapters;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentStatePagerAdapter;
import android.util.Log;

import app.sapnachaudhary2018.fragments.ChannelFragment;
import app.sapnachaudhary2018.fragments.FavouriteFragment;
import app.sapnachaudhary2018.fragments.PlayListFragment;
import app.sapnachaudhary2018.fragments.PlayListFragment2;
import app.sapnachaudhary2018.fragments.PlayListFragmentPublic;
import app.sapnachaudhary2018.models.TabModel;


/**
 * Created by mdmunirhossain on 12/18/17.
 */

public class PagerAdapter extends FragmentStatePagerAdapter {
    int mNumOfTabs;

    public PagerAdapter(FragmentManager fm, int NumOfTabs) {
        super(fm);
        this.mNumOfTabs = NumOfTabs;
    }

    

    @Override
    public Fragment getItem(int position) {

        if(position>=0){
            if(position< TabModel.tabnameList.size()){
                if(TabModel.playlistOrChannelList.get(position).equalsIgnoreCase("playlist")){
                    String tabUrl = TabModel.idRegardingyoutubeList.get(position);
                    Log.d("App: positiontaburl",position+""+tabUrl);
                    PlayListFragment playTab = PlayListFragment.newInstance(tabUrl);
                    return playTab;
                }else
                {
                    String tabUrl = TabModel.idRegardingyoutubeList.get(position);
                    Log.d("App: positiontaburl",position+""+tabUrl);
                    ChannelFragment channelTab = ChannelFragment.newInstance(tabUrl);
                    return channelTab;
                }

            }else{
                FavouriteFragment tab4 = new FavouriteFragment();
                return tab4;
            }
        }else{
            return null;
        }

        /*switch (position) {
            case 0:
                //ChannelFragment tab1 = new ChannelFragment();
                PlayListFragment tab1 = PlayListFragment.newInstance("PL2-dafEMk2A6QKz1mrk1uIGfHkC1zZ6UU");
                return tab1;
            case 1:
                PlayListFragment2 tab2 = new PlayListFragment2();
                return tab2;
            case 2:
                PlayListFragmentPublic tab3 = new PlayListFragmentPublic();
                return tab3;
            case 3:
                FavouriteFragment tab4 = new FavouriteFragment();
                return tab4;
            default:
                return null;
        }*/

    }



    @Override
    public int getCount() {
        return mNumOfTabs;
    }
}
