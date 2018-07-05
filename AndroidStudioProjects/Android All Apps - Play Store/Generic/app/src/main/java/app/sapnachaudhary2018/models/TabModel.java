package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "2018", "2017", "Public");
    public static List<String> idRegardingyoutubeList = Arrays.asList("PL_mlupJ4yJIhmXRzCmdN_1IXcwvBGyUpj", "PL_mlupJ4yJIgHGlxTXdTUpvsMrtZv0zGD", "UCOhHO2ICt0ti9KAh-QHvttQ");
    public static List<String> playlistOrChannelList = Arrays.asList("playlist", "playlist", "channel");

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
