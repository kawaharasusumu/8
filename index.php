<?php
// newsに表示用の変数を定義
$view = "";
// DB接続
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
// create_date の降順に5件取得
// 日付の表示をMySQLの関数、DATE_FORMATで整形
//$sql = "SELECT news_id, news_title, DATE_FORMAT(create_date , '%Y.%m.%d') AS create_date FROM news ORDER BY create_date DESC LIMIT 5";
// category テーブルを作り、そこからカテゴリー情報を取得するように変更
$sql = "SELECT news.news_id, category.category_name, news.news_title, DATE_FORMAT(news.create_date, '%Y.%m.%d') AS create_date 
		FROM news, category WHERE news.category_id = category.category_id ORDER BY news.create_date DESC LIMIT 5";
// var_dump($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;

foreach($results as $row){
	// var_dump($row);
	$title = $row["news_title"];
	$title = mb_substr($title, 0, 10, "utf-8");
	$title = '<a href="news.php?news_id=' . $row["news_id"] . '">' . $title . '</a>';
	$view .= '<dt class="news-date">' . $row["create_date"] .'</dt>';
	$view .= '<dd class="news-description">' . $title . '</dd>';
	$view .= '<dd class="news-description">' . $row["category_name"] . '</dd>';
}

?>

<?php include("header.php") ?>
    
    <section class="main_visual">
        <div class="inner">
            <p class="catch text-center">世界を震わすチーズを創ろう。<span class="catch-small">新しい形のチーズ職人養成学校、はじまります。</span></p>
        </div>
    </section>
    
    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span><span class="section-title-ja text-center">お知らせ・更新情報</span>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
            	<?php echo $view ?>
            </dl>
            <p class="view-detail text-right"><a href="news_list.php">ニュース一覧を見る</a></p>
        </article>
    </section>
   
    <section class="feature contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="section-title__white">Feature</span><span class="section-title-ja text-center">特徴</span>
            </h2>
            <ul class="list-feature">
                <li><img src="img/point1.png" alt=""></li>
                <li><img src="img/point2.png" alt=""></li>
                <li><img src="img/point3.png" alt=""></li>
            </ul>
        </div>
    </section>
    
    <section class="cource contents-box">
        <div class="inner">
            <h2 class="section-title text-center">
                <span class="">Cource</span><span class="section-title-ja text-center">コース紹介</span>
            </h2>
            <div class="block-cource block-cource-lab clearfix">
                <div class="cource-img"><img src="img/cource-lab.png" alt=""></div>
                <div class="cource-txt cource-txt__usually">
                <h3 class="cource-title text-center">LABコース</h3>
                <p>週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    </p>
                </div>
            </div>
            <div class="block-cource clearfix">   
                <div class="cource-img__reverse">
                    <img src="img/cource-academy.png" alt="">
                </div>
                <div class="cource-txt cource-txt__reverse">
                    <h3 class="cource-title text-center">ACADEMYコース</h3>
                    <p>週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    週末集中型の初心者対象のチーズ職人養成講座です。<br />
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Gallery</span><span class="section-title__white section-title-ja text-center">ギャラリー</span
            </h2>
        </div>
        <div class="inner contents-box">
            <ul class="list-gallery clearfix">
                <li><a href="#"><img src="img/gallery01.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery02.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery03.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery04.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery05.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery06.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery07.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery08.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery09.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery10.jpg" alt="" /></a></li>
                <li><a href="#"><img src="img/gallery11.jpg" alt="" /></a></li>
                <li class="no-white-space"><a href="#"><img src="img/gallery12.jpg" alt="" /></a></li>
            </ul>
        </div>
    </section>

    <section class="entry-form">
        <div class="contents-heading bg-yellow">
            <h2 class="section-title text-center">
                <span class="section-title">Entry</span><span class="section-title__white section-title-ja text-center">説明会に申し込む</span></h2>
        </div>
        <div class="inner contents-box">
            <form action="#" class="form-module">
                <table>
                    <tr>
                        <td class="form-text">氏名</td>
                        <td><input type="text" value="" name="name"></td>
                    </tr>
                    <tr>
                        <td class="form-text">フリガナ</td>
                        <td><input type="text" value="" name="kana"></td>
                    </tr>
                    <tr>
                        <td class="form-text">メールアドレス</td>
                        <td><input type="text" value="" name="email"></td>
                    </tr>
                    <tr>
                        <td class="form-text">説明会の希望日時</td>
                        <td><select id="select-box" name="date">
                                <option value="2015/7/18 10:00">2015/7/18 10:00</option>
                                <option value="2015/7/25 10:00">2015/7/25 10:00</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-text">志望動機</td>
                        <td>
                            <label for="1"><input type="radio" name="motivation" value="起業したい" id="1">起業をしたい</label>
                            <label for="2"><input type="radio" name="motivation" value="チーズ企業に就職したい。" id="2">チーズ企業に就職したい。</label>
                            <label for="3"><input type="radio" name="motivation" value="チーズと関わる仕事なので、知識をつけたい。" id="3">チーズと関わる仕事なので、知識をつけたい。</label>
                            <label for="4"><input type="radio" name="motivation" value="教養として身につけたい" id="4">教養として身につけたい</label>
                        </td>
                    </tr>
                </table>
                <p class="text-center"><input type="submit" class="entry-btn"></p>
            </form>
        </div>
    </section>

    <!--#information-->
    <footer class="footer contents-box">
    <h2 class="section-title text-center"><span class="section-title__white">Information</span><span class="section-title-ja section-title__white text-center">基本情報</span></h2>

<? include("footer.php") ?>