package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "Latest","NAVIDAD Y NOCHE BUENA","Test");
    public static List<String> idRegardingyoutubeList = Arrays.asList("UCBNs31xysxpAGMheg8OrngA","PL-xQp139lwbJWGIb5-VLXJPbsG1l_vP9x","PL-xQp139lwbJWGIb5-VLXJPbsG1l_vP9x,PL-xQp139lwbJWGIb5-VLXJPbsG1l_vP9x");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlist","playlistSplash");


    public static ArrayList<String> ptabnameList = new ArrayList<String>();
    public static ArrayList<String> pidRegardingyoutubeList = new ArrayList<String>();
    public static ArrayList<String> pplaylistOrChannelList = new ArrayList<String>();


    String tabName;
    String idRegardingYoutube;
    String playStringOrChannel;

    public TabModel(String tabName) {
        this.tabName = tabName;
    }

    public TabModel(String tabName, String idRegardingYoutube, String playStringOrChannel) {
        this.tabName = tabName;
        this.idRegardingYoutube = idRegardingYoutube;
        this.playStringOrChannel = playStringOrChannel;
    }

    public String getTabName() {
        return tabName;
    }

    public void setTabName(String tabName) {
        this.tabName = tabName;
    }

    public String getIdRegardingYoutube() {
        return idRegardingYoutube;
    }

    public void setIdRegardingYoutube(String idRegardingYoutube) {
        this.idRegardingYoutube = idRegardingYoutube;
    }

    public String getPlayStringOrChannel() {
        return playStringOrChannel;
    }

    public void setPlayStringOrChannel(String playStringOrChannel) {
        this.playStringOrChannel = playStringOrChannel;
    }
}
