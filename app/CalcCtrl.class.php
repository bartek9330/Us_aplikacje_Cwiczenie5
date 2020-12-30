<?php

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku


	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
        $this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
        $this->form->lata = isset($_REQUEST ['lata']) ? $_REQUEST ['lata'] : null;
        $this->form->oprocentowanie = isset($_REQUEST ['oprocentowanie']) ? $_REQUEST ['oprocentowanie'] : null;
	
	}
	

	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lata ) && isset ( $this->form->oprocentowanie ))) {
			return false; //zakończ walidację z błędem
		}
		
        if ($this->form->kwota == "") {
            $this->msgs->addError('Nie podano kwoty kredytu');
        }

        if ($this->form->lata == "") {
            $this->msgs->addError('Nie podano czasu kredytowania');
        }

        if ($this->form->oprocentowanie == "") {
            $this->msgs->addError('Nie podano oprocentowania');
        }
		
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){

                    $this->getparams();
                
        if ($this->validate()) {
            
            $this->form->kwota = intval($this->form->kwota);
            $this->form->lata = intval($this->form->lata);
            $this->form->oprocentowanie = floatval($this->form->oprocentowanie);
            $this->msgs->addInfo('');

            $this->result->result = ($this->form->kwota / ($this->form->lata * 12)) * ($this->form->oprocentowanie / 100);
            $this->result->result = round($this->result->result, 2);

            $this->msgs->addInfo('Obliczenia zostaly wykonane');
        }

        $this->generateView();

    }
	
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Cwiczenie nr5');
		$smarty->assign('page_description','Funkcjonalność aplikacji zamknięta w metodach różnych obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiektowosc');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}
