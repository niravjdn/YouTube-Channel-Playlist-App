package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "Latest","Playlists");
    public static List<String> idRegardingyoutubeList = Arrays.asList("UCS5Oz6CHmeoF7vSad0qqXfw",
            "PLUR-PCZCUv7TWdKxeBjWbIljiHlxwSheO,PLUR-PCZCUv7R9oanEjvwO6GNjnQugheGl,PLUR-PCZCUv7RWLCpD0C5dblwYWx9wTq9n,PLUR-PCZCUv7Qd3jUZO2afcd_Q7TIgZfgv," +
                    "PLUR-PCZCUv7TwqSmfF_rzVSXVRE-WqdvJ,PLUR-PCZCUv7QsdLdRWkxpBYi5HOc6vYso,PLUR-PCZCUv7QShYnu14VBgUaWGHKaVVzB,PLUR-PCZCUv7RnxmAfr-YbSpvXd1bJxdlp," +
                    "PLUR-PCZCUv7T1x2A9yyWkhMx9dKAi8f-0,PLUR-PCZCUv7TW0wSd5EvoNiXnDoHwH63-,PLUR-PCZCUv7RJYXh5wZuIzjJ2nit9-9Q5");
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlistSplash");

    // channel playlist playlistSplash

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
