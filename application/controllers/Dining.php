<?php 
/**
* 
*/
class Dining extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('skripsi_model');
		$this->load->library('session');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('enter');
	}
	public function menu()
	{
		$connect = fsockopen($this->input->post('ip'), "80", $errno, $errstr, 1);
			if($connect) {
				// <GetAttLog>
				// 	<ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
				// 	<Arg>
				// 		<PIN xsi:type=\"xsd:integer\">All</PIN>
				// 		<Date xsi:type=\"xsd:string\">".date("Y-m-d")."</Date>
				// 	</Arg>
				// </GetAttLog>
				$soap_request = "<GetAttLog>
												<ArgComKey xsi:type=\"xsd:integer\">" . $this->input->post('key') . "</ArgComKey>
												<Arg>
												<DateTime xsi:type=\"xsd:string\">" . date("Y-m-d H:i:s") . "</DateTime>
												</Arg>
												</GetAttLog>";
												// <PIN xsi:type=\"xsd:integer\">11085</PIN>
				$newLine = "\r\n";
				fputs($connect, "POST /iWsService HTTP/1.0" . $newLine);
				fputs($connect, "Content-Type: text/xml" . $newLine);
				fputs($connect, "Content-Length: " . strlen($soap_request) . $newLine . $newLine);
				fputs($connect, $soap_request . $newLine);
				$buffer = "";
				while($Response = fgets($connect, 1024)) {
					$buffer = $buffer . $Response;
				}
			} else {
				echo "Koneksi Gagal";
			}
			include("parse.php");
			$buffer = Parse_Data($buffer, "<GetAttLogResponse>", "</GetAttLogResponse>");
			$buffer = explode("\r\n", $buffer);
		$data['buffer'] = $buffer;
		$data['ip'] = $this->input->post('ip');
		$data['key'] = $this->input->post('key');
		$this->load->view('get_data', $data);
	}
	public function uploadtodatabase()
	{
		$connect = fsockopen($this->input->post('ip'), "80", $errno, $errstr, 1);
			if($connect) {
				// <GetAttLog>
				// 	<ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
				// 	<Arg>
				// 		<PIN xsi:type=\"xsd:integer\">All</PIN>
				// 		<Date xsi:type=\"xsd:string\">".date("Y-m-d")."</Date>
				// 	</Arg>
				// </GetAttLog>
				$soap_request = "<GetAttLog>
												<ArgComKey xsi:type=\"xsd:integer\">" . $this->input->post('key') . "</ArgComKey>
												<Arg>
												<DateTime xsi:type=\"xsd:string\">" . date("Y-m-d H:i:s") . "</DateTime>
												</Arg>
												</GetAttLog>";
												// <PIN xsi:type=\"xsd:integer\">11085</PIN>
				$newLine = "\r\n";
				fputs($connect, "POST /iWsService HTTP/1.0" . $newLine);
				fputs($connect, "Content-Type: text/xml" . $newLine);
				fputs($connect, "Content-Length: " . strlen($soap_request) . $newLine . $newLine);
				fputs($connect, $soap_request . $newLine);
				$buffer = "";
				while($Response = fgets($connect, 1024)) {
					$buffer = $buffer . $Response;
				}
			} else {
				echo "Koneksi Gagal";
			}
			include("parse.php");
			$buffer = Parse_Data($buffer, "<GetAttLogResponse>", "</GetAttLogResponse>");
			$buffer = explode("\r\n", $buffer);
			for ($i=0; $i <count($buffer)-2 ; $i++) { 	
				$data = Parse_Data($buffer[$i], "<Row>", "</Row>");
				$PIN = Parse_Data($data, "<PIN>", "</PIN>");
				$DateTime = Parse_Data($data, "<DateTime>", "</DateTime>");
				$Verified = Parse_Data($data, "<Verified>", "</Verified>");
				$Status = Parse_Data($data, "<Status>", "</Status>");	
				$temp[$i] = array(
					'pin' => $PIN,
					'date_time' => $DateTime,
					'ver' => $Verified,
					'status' => $Status,
					);
				$this->skripsi_model->add($temp[$i]);
			}
			$temporary['ip'] = $this->input->post('id');
			$temporary['key'] = $this->input->post('key');
			$temporary['buffer'] = $buffer;
			$this->session->set_flashdata('message','Data has been uploaded to Database');
			$this->load->view('get_data',$temporary);
	}
}
 ?>