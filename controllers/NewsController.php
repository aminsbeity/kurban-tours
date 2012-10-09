<?php

class NewsController {
	public static $NEWS_LIMIT=10;
	function __construct(){}
	
	public function displayLatestNews(){
		
		
		
		$latestNewsObj=new LatestNewsMySqlExtDAO();
		$newsArray=$latestNewsObj->queryAllOrderBy('latest_news_id');
		
		$recordsCount = count ( $newsArray );
		$numberOfPages = ceil ( $recordsCount / NewsController::$NEWS_LIMIT );
		
		$offset = 0;
		$page = 1;
		
		$link = option ( 'base_uri' ) . "news";
		
		set_or_default ( 'page', params ( 'page' ), '1' );
		if (params ( 'page' ) != "") {
			$page = intval ( params ( 'page' ) );
			$offset = ($page - 1) * NewsController::$NEWS_LIMIT ;
		}
		
		$newsArray=$latestNewsObj->getAllNews(NewsController::$NEWS_LIMIT,$offset);
		
		set("newsArray",$newsArray);
		
		set ( 'numberOfPages', $numberOfPages );
		set ( 'link', $link );
		set ( 'page', $page );
		
		set ( "templateTitle", "Latest News" );
		set ( "tplSection", render ( "news.tpl.php" ) );
	}
	
	public function displayLatestNewsDetails(){
		$newsId=ValidatorClass::prepareQuery(params('newsId'),"INT");
		$latestNewsObj=new LatestNewsMySqlExtDAO();
		$newsInfo=$latestNewsObj->load($newsId);
		set("newsInfo",$newsInfo);
		set ( "templateTitle", "Latest News" );
		set ( "tplSection", render ( "newsDetails.tpl.php" ) );
	}
	
	function generateNewsRss(){
		$latestNewsObj=new LatestNewsMySqlExtDAO();
		$newsArray=$latestNewsObj->queryAllOrderBy('latest_news_id');
		
		$date=$newsArray[0]->latestNewsDate;
		
		$embedRss = '<?xml version="1.0" encoding="UTF-8"?>
		
		<rss version="2.0"
		xmlns:content="http://purl.org/rss/1.0/modules/content/"
		xmlns:wfw="http://wellformedweb.org/CommentAPI/"
		xmlns:dc="http://purl.org/dc/elements/1.1/"
		xmlns:atom="http://www.w3.org/2005/Atom"
		xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
		xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
		>
		
			<channel>
				<title>kurbantours</title>
				<link>http://www.kurbantours.com/</link>
				<description>kurbantours News RSS Feed</description>
				<lastBuildDate>'.$date.'</lastBuildDate>
				<language>en-us</language>
				';
		foreach($newsArray as $rowNews){
			$title = str_replace("& ","and ",$rowNews->latestNewsTitle);
			$description = str_replace("& ","and ",$rowNews->latestNewsDetails);
			$embedRss .=
			'		
				<item>
				<title>'.strip_tags($title).'</title>
				<link>http://www.kurbantours.com/?/news-details/'.$rowNews->latestNewsId.'</link>
				<guid>http://www.rogerachkar.com/?/news-details/'.$rowNews->latestNewsId.'</guid>
				<pubDate>'.$rowNews->latestNewsDate.'</pubDate>
				<description><![CDATA[ '.strip_tags($description).' ]]></description>
				</item>
			';
		}
		$embedRss .=
		'
			</channel>
		</rss>
		';
		
		$File = option ( 'views_dir').'/feed.xml';
		$Handle = fopen($File, 'w');
		fwrite($Handle, $embedRss);
		fclose($Handle);
		set("embedRss", $embedRss);
		return render("feed.tpl.php");
		
	}
	
}

?>