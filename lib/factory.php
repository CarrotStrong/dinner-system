<?php

class Factory{

	public function __construct(){
		include('./lib/database.php');
	}
	
	public function run(){

		$miejsceBazy = 'KRA';
		if (!empty($_GET['miejsceBazy']))
			$miejsceBazy = $_GET['miejsceBazy'];

		$list = Database::getList($this->getToday(),$miejsceBazy);
		$news = Database::buildNewsData();
		$this->view($list, $news);
	}
	
	public function view($list, $news){
		$data = array(
			'date' => $this->getPolishDate(),
			'orders' => $list,
			'news' => $news
		);
		include('./view/index.php');
	}
	
	protected function getToday(){
		$week = array (
			'Monday' => 'Poniedziałek',
			'Tuesday' => 'Wtorek',
			'Wednesday' => 'Środa',
			'Thursday' => 'Czwartek',
			'Friday' => 'Piątek',
			'Saturday' => 'Sobota',
			'Sunday' => 'Niedziela'
		  );
		return $week[date('l')];
	}
	
	protected function getPolishDate(){
		$week = array (
			'Monday' => 'Poniedziałek',
			'Tuesday' => 'Wtorek',
			'Wednesday' => 'Środa',
			'Thursday' => 'Czwartek',
			'Friday' => 'Piątek',
			'Saturday' => 'Sobota',
			'Sunday' => 'Niedziela'
		  );
	  
	  $month = array (
			'January' => 'stycznia',
			'February' => 'lutego',
			'March' => 'marca',
			'April' => 'kwietnia',
			'May' => 'maja',
			'June' => 'czerwca',
			'July' => 'lipca',
			'August' => 'sierpnia',
			'September' => 'wrzesnia',
			'October' => 'października',
			'November' => 'listopada',
			'December' => 'grudnia'
		);
		
		return $week[date('l')] .', '.date('d').' '.$month[date('F')].' '.date('Y').'r.';
	}
}