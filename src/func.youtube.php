<?php
/**
 *  parse_youtube_url() PHP function
 *  Author: takien
 *  URL: http://takien.com
 * 
 *  @param  string  $url    URL to be parsed, eg: 
 *                            http://youtu.be/zc0s358b3Ys, 
 *                            http://www.youtube.com/embed/zc0s358b3Ys
 *                            http://www.youtube.com/watch?v=zc0s358b3Ys
 *  @param  string  $return what to return
 *                            - embed, return embed code
 *                            - thumb, return URL to thumbnail image
 *                            - hqthumb, return URL to high quality thumbnail image.
 *  @param  string     $width  width of embeded video, default 560
 *  @param  string  $height height of embeded video, default 349
 *  @param  string  $rel    whether embeded video to show related video after play or not.

 */ 
 
 function parse_youtube_url($url,$return='embed',$width='',$height='',$rel=0){
    $urls = parse_url($url);
    
    //expect url is http://youtu.be/abcd, where abcd is video iD
    if($urls['host'] == 'youtu.be'){ 
        $id = ltrim($urls['path'],'/');
    }
    //expect  url is http://www.youtube.com/embed/abcd
    else if(strpos($urls['path'],'embed') == 1){ 
        $id = end(explode('/',$urls['path']));
    }
     //expect url is abcd only
    else if(strpos($url,'/')===false){
        $id = $url;
    }
    //expect url is http://www.youtube.com/watch?v=abcd
    else{
        parse_str($urls['query']);
        $id = $v;
    }
    //return embed iframe
    if($return == 'embed'){
        return '<iframe width="'.($width?$width:560).'" height="'.($height?$height:349).'" src="http://www.youtube.com/embed/'.$id.'?rel='.$rel.'" frameborder="0" allowfullscreen>';
    }
    //return normal thumb
    else if($return == 'thumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/default.jpg';
    }
    //return hqthumb
    else if($return == 'hqthumb'){
        return 'http://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg';
    }
    // else return id
    else{
        return $id;
    }
}
?>