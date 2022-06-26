<?php 

class ViewHelper {
    public static function img($path) {
        $uri = get_template_directory_uri(). '/public/img/' . $path;
        return $uri;
    }

    public static function getRequestUrl() {
        $uri = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        return $uri; 
    }

    public static function archivePageTitle() {
        $pageTitle = '';
        $value = '';
        
        if (is_search()) { 
            $pageTitle = 'Kết quả tìm kiếm';
            $value = '"'. htmlspecialchars($_GET['s']) . '"';
        } elseif (is_archive()) {
            $term = get_queried_object();
            $termId = $term->term_id;
            $value = $term->name;
            if (is_tag($termId)) {
                $pageTitle = 'Chủ đề';
            }
            else if (is_category($termId)) {
                $pageTitle = 'Danh mục';
            }
        } elseif (is_home()) {
            $pageTitle = 'Trang chủ';
            $value = 'bài viết mới nhất';
        }

        echo '<h3 class="uppercase fw-bold mb-24">';
        echo '  <span style="border-bottom: 1px solid var(--color-h2l2);">' . $pageTitle . ': </span>';
        echo '  <span>' . $value . '</span>';
        echo '</h3>';
    }

    public static function noRecordMessage() {
        if (is_search()) { 
            echo '<p> Không tìm được bài viết có liên quan. <a href="'.get_home_url(). '"> Quay về trang chủ </a></p>';
        } else {
            if (is_archive()) {
                $term = get_queried_object();
                $termId = $term->term_id;
                if (is_tag($termId)) {
                    echo '<p> Hiện chưa có bài viết nào trong chủ đề này. <a href="'.get_home_url(). '"> Quay về trang chủ </a></p>';
                }
                else if (is_category($termId)) {
                    echo '<p> Hiện chưa có bài viết nào trong danh mục này. <a href="'.get_home_url(). '"> Quay về trang chủ </a></p>';
                }
            }
        }
        
    }

    public static function postViewsCount($postId) {
        $count_key = 'views';
        return (int)get_post_meta($postId, $count_key, true);
    }

    public static function tiengVietKhongDau($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}