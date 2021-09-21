<?php 

class LgxFrameworkOpt{
    // logo
    public function lgx_event_point_logo(){
        global $lgx_event_point; 
        if((isset($lgx_event_point['logo-up']['url'])) && !empty($lgx_event_point['logo-up']['url'])){
            return $lgx_event_point['logo-up']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/logo.png";
        }  
    } 
 
    // Page Banner image 
    function lgx_event_point_page_banner(){
        global $post,$lgx_event_point;
        if(is_page()){
            if( null != get_post_meta($post->ID,'_lgx_event_point_page_banner',true) ){
                return get_post_meta($post->ID,'_lgx_event_point_page_banner',true);
            }else{
                return get_template_directory_uri()."/img/banner-inner.jpg";
            }
        }elseif(is_archive() || is_category() || is_tag()){
            if((isset($lgx_event_point['archv-banner']['url'])) && !empty($lgx_event_point['archv-banner']['url'])){
                return $lgx_event_point['archv-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-inner.jpg";
            }   
        }elseif(is_search() ){
            if((isset($lgx_event_point['srch-banner']['url'])) && !empty($lgx_event_point['srch-banner']['url'])){
                return $lgx_event_point['srch-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-inner.jpg";
            }   
        }elseif(is_single() ){
            if((isset($lgx_event_point['single-banner']['url'])) && !empty($lgx_event_point['single-banner']['url'])){
                return $lgx_event_point['single-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-inner.jpg";
            }   
        }else{
            if((isset($lgx_event_point['blog-banner']['url'])) && !empty($lgx_event_point['blog-banner']['url'])){
                return $lgx_event_point['blog-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-inner.jpg";
            }   
        } 
    }
  
    // blog sidebar options
    public function lgx_event_point_blogSidebar(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['blog-sidebar']) ){
            return $lgx_event_point['blog-sidebar'];
        }else{
            return "right";
        }
 
    }
    // archive sidebar options
    public function lgx_event_point_archiveSidebar(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['archv-sidebar']) ){
            return $lgx_event_point['archv-sidebar'];
        }else{
            return "right";
        }
 
    }
    // archive sidebar options
    public function lgx_event_point_shopSidebar(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['shop-sidebar']) ){
            return $lgx_event_point['shop-sidebar'];
        }else{
            return "full";
        }
 
    }
    // search sidebar options
    public function lgx_event_point_searchSidebar(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['srch-sidebar']) ){
            return $lgx_event_point['srch-sidebar'];
        }else{
            return "right";
        } 
    } 

    // default banner date
    public function lgx_event_point_dfl_banner_date(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['dflt-date']) ){
            return $lgx_event_point['dflt-date'];
        }else{
            return "2019/12/15";
        } 
    } 
    // default banner title
    public function lgx_event_point_dfl_banner_title(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['dflt-title']) ){
            return $lgx_event_point['dflt-title'];
        }else{
            return "";
        } 
    }  
    // default banner subtitle
    public function lgx_event_point_dfl_banner_subtitle(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['dflt-sbttl']) ){
            return $lgx_event_point['dflt-sbttl'];
        }else{
            return "";
        } 
    } 


    // big gradiant date
    public function lgx_event_point_big_gradiant_date(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['grdnt-date']) ){
            return $lgx_event_point['grdnt-date'];
        }else{
            return "2019/12/15";
        } 
    } 
    // big gradiant title
    public function lgx_event_point_big_gradiant_title(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['grdnt-sldr-ttl']) ){
            return $lgx_event_point['grdnt-sldr-ttl'];
        }else{
            return "";
        } 
    }  
    // big gradiant subtitle
    public function lgx_event_point_big_gradiant_subtitle(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['grdnt-sldr-sbttl']) ){
            return $lgx_event_point['grdnt-sldr-sbttl'];
        }else{
            return "";
        } 
    }  


    // big banner date
    public function lgx_event_point_big_banner_date(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['bnr-date']) ){
            return $lgx_event_point['bnr-date'];
        }else{
            return "2019/12/15";
        } 
    } 
    // big banner title
    public function lgx_event_point_big_banner_title(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['bnr-title']) ){
            return $lgx_event_point['bnr-title'];
        }else{
            return "";
        } 
    }  
    // big banner subtitle
    public function lgx_event_point_big_banner_subtitle(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['bnr-sbttl']) ){
            return $lgx_event_point['bnr-sbttl'];
        }else{
            return "";
        } 
    } 
    // big banner subtitle
    public function lgx_event_point_big_banner_small(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['bnrsml-title']) ){
            return $lgx_event_point['bnrsml-title'];
        }else{
            return "";
        } 
    } 
    // Type string
    public function lgx_event_point_typing_string(){
        global $lgx_event_point; 
        return (!empty($lgx_event_point['typed-string'])) ? $lgx_event_point['typed-string'] : '';       
            
    }  
    // typed string
    public function lgx_event_point_typ_subttl(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['typed-sbttl']) ){
            return $lgx_event_point['typed-sbttl'];
        }else{
            return "";
        } 
    } 
    // typed string
    public function lgx_event_point_typ_ttl(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['typed-ttl']) ){
            return $lgx_event_point['typed-ttl'];
        }else{
            return "";
        } 
    } 
    // typed string
    public function lgx_event_point_typ_date(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['typ-date']) ){
            return $lgx_event_point['typ-date'];
        }else{
            return "";
        } 
    } 
    // content slider
    public function lgx_event_point_cntnt_sldr_date(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['cntnt-date']) ){
            return $lgx_event_point['cntnt-date'];
        }else{
            return "";
        } 
    } 

// footer


    // footer title
    public function lgx_event_point_footer_title(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-title']) ){
            return $lgx_event_point['footer-title'];
        }else{
            return "";
        } 
    } 
    // footer logo
    public function lgx_event_point_footer_logo(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-logo']['url']) ){
            return $lgx_event_point['footer-logo']['url'];
        }else{
            return get_template_directory_uri()."/assets/img/logo.png";
        } 
    } 

    // footer social
    public function lgx_event_point_footer_fb(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-fb']) ){
            return $lgx_event_point['footer-fb'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_tw(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-tw']) ){
            return $lgx_event_point['footer-tw'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_gp(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-gp']) ){
            return $lgx_event_point['footer-gp'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_ld(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-ld']) ){
            return $lgx_event_point['footer-ld'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_sc(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-sc']) ){
            return $lgx_event_point['footer-sc'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_yt(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-yt']) ){
            return $lgx_event_point['footer-yt'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_inst(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-inst']) ){
            return $lgx_event_point['footer-inst'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_pin(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-pin']) ){
            return $lgx_event_point['footer-pin'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_flk(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-flk']) ){
            return $lgx_event_point['footer-flk'];
        }else{
            return "";
        } 
    } 
    public function lgx_event_point_footer_tumb(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-tumb']) ){
            return $lgx_event_point['footer-tumb'];
        }else{
            return "";
        } 
    } 
    // copyright text
    public function lgx_event_point_footer_copy(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['copyright-text']) ){
            return $lgx_event_point['copyright-text'];
        }else{
            return "";
        } 
    } 

    // mailchimp shortcode
    public function lgx_event_point_footer_subscribe(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['mailchimp-text']) ){
            return $lgx_event_point['mailchimp-text'];
        }else{
            return "";
        } 
    } 
    // mailchimp shortcode
    public function lgx_event_point_footer_col(){
        global $lgx_event_point;  
        if(isset($lgx_event_point['footer-type']) ){
            return $lgx_event_point['footer-type'];
        }else{
            return 0;
        } 
    } 


 
}
