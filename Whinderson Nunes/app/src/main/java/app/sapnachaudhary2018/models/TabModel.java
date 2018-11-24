package app.sapnachaudhary2018.models;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 * Created by pashvinkumar on 04-06-2018.
 */

public class TabModel {
    public static List<String> tabnameList = Arrays.asList(
            "Latest","PARÓDIAS!","COMO EU ME SINTO"
            );

    public static List<String> idRegardingyoutubeList = Arrays.asList("UC3KQ5GWANYF8lChqjZpXsQw",
            "PLypClbHDpCW3-wt36qfTiwF-qW4UDDvpW","PLypClbHDpCW03UsKUMMduuOGYAgU1JxIE"
           );
    public static List<String> playlistOrChannelList = Arrays.asList("channel","playlist","playlist"
            );


    public static List<String> natakTabnameList = Arrays.asList(
            "Sanjay Goradia","Siddharth Randeria","Movies","Other");
    public static List<String> natakIdRegardingyoutubeList = Arrays.asList("UCuB112ZHY1iygcDEHRg6P5Q","PLlT5Mh7LdcLZk2MB6LiUbZ2YbJQbj3mZv","PLP-nGFpz3fa_0O0nN4kMLbZ6V_equSZLN");
    public static List<String> natakPlaylistOrChannelList = Arrays.asList("channel","playlist","playlist");

    public static List<String> speechtabnameList = Arrays.asList(
            "Sanjay Raval","Kaajal Oza Vaidya","Other");
    public static List<String> speechIdRegardingyoutubeList = Arrays.asList("UC8UNjyAx5qAXbGvEsoQvvhA","UCdaBOxXgS01jBOFVG1x4j3w","PL_mlupJ4yJIgo7gDXtsbqjf10vp-y2zUl");
    public static List<String> speechPlaylistOrChannelList = Arrays.asList("channel","channel","playlist");


    public static List<String> bhajanTabnameList = Arrays.asList(
            "Bhajan","Dayro");
    public static List<String> bhajanIdRegardingyoutubeList = Arrays.asList("PL_mlupJ4yJIhyA03VXq_s1bEEgRUxn0nz","PL_mlupJ4yJIjmncM8Gl5K5LZ47-ZxWUZk");
    public static List<String> bhajanPlaylistOrChannelList = Arrays.asList("playlist","playlist");


    public static List<String> garbaTabnameList = Arrays.asList(
            "Kinjal Dave","Geeta Rabari","Jignesh Kaviraj","Other");
    public static List<String> garbaIdRegardingyoutubeList = Arrays.asList("PL_mlupJ4yJIiZNDf8H268PEc9zxR6eYlr","PL_mlupJ4yJIiZCWv8J2O9mxKMSC4Dr49w","PL_mlupJ4yJIijITMwsA0jro_FxXQP38Mw","PL_mlupJ4yJIgsoVG4Sb9SEFiva7NBz70R");
    public static List<String> garbaPlaylistOrChannelList = Arrays.asList("playlist","playlist","playlist","playlist");



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
