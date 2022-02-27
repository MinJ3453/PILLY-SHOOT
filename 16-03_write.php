<?php
    require_once("tools2.php");
    require_once("BoardDao.php");

    // 전달된 값 저장
    $writer  = requestValue("writer");
    $title   = requestValue("title");
    $content = requestValue("content");
	
	//파일 업로드
		$upload_succeeded = false;
    if ($_FILES["upload"]["error"] == UPLOAD_ERR_OK) {
		 $temp_name = $_FILES["upload"]["tmp_name"];
         $file_name = $_FILES["upload"]["name"];
         $file_size = $_FILES["upload"]["size"];
         $file_type = $_FILES["upload"]["type"];
		 $file_name =  date("YmdHis").".jpg";
         $save_name = iconv("utf-8", "cp949", $file_name);
         
         if (move_uploaded_file($temp_name, "files/$save_name"))
         $upload_succeeded = true;
 }

    // 빈 칸 없이 모든 값이 전달되었으면 insert
    if ($writer && $title && $content) {
        $dao = new BoardDao();
        $dao->insertMsg($writer, $title, $content, $save_name);

        // 글 목록 페이지로 복귀
        goNow(bdUrl("community.php", 0, 0));
    } else
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
?>
