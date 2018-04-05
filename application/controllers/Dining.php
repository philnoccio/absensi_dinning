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
		$data['ip'] = $this->input->post('ip');
		$data['key'] = $this->input->post('key');
		$data['buffer'] = $this->Connect($data['ip'], $data['key']);;
		$this->load->view('get_data', $data);
	}
	public function uploadtodatabase()
	{
		$buffer = $this->Connect($this->input->post('ip'), $this->input->post('key'));
			for ($i=0; $i <count($buffer)-2 ; $i++) { 	
				$data = Parse_Data($buffer[$i], "<Row>", "</Row>");
				$PIN = Parse_Data($data, "<PIN>", "</PIN>");
				$DateTime = Parse_Data($data, "<DateTime>", "</DateTime>");
				$Verified = Parse_Data($data, "<Verified>", "</Verified>");
				$Status = Parse_Data($data, "<Status>", "</Status>");
				list($date,$time) = explode(' ',$DateTime);	
				$mahasiswa = $this->skripsi_model->getNimByPin($PIN);
				$temp[$i] = array(
					'pin' => $PIN,
					'nim' => $mahasiswa->nim,
					'tanggal' => $date,
					'status' => $Verified,
					'jammasuk' => $time,
					);
				$this->skripsi_model->add($temp[$i]);
			}
			$temporary['ip'] = $this->input->post('ip');
			$temporary['key'] = $this->input->post('key');
			$temporary['buffer'] = $buffer;
			$this->session->set_flashdata('message','Data has been uploaded to Database');
			$this->load->view('get_data',$temporary);
	}
	public function Connect($ip, $key)
	{
		$connect = fsockopen($ip, "80", $errno, $errstr, 1);
			if($connect) {
				// <GetAttLog>
				// 	<ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey>
				// 	<Arg>
				// 		<PIN xsi:type=\"xsd:integer\">All</PIN>
				// 		<Date xsi:type=\"xsd:string\">".date("Y-m-d")."</Date>
				// 	</Arg>
				// </GetAttLog>
				$soap_request = "<GetAttLog>
												<ArgComKey xsi:type=\"xsd:integer\">" . $key . "</ArgComKey>
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
			return $buffer = explode("\r\n", $buffer);
	}
	public function read()
	{
		$data['mahasiswa'] = $this->skripsi_model->read();
		$this->load->view('read_mahasiswa', $data);
	}
	public function create()
	{
		$this->load->view('insert_mahasiswa');
	}
	public function insert()
	{
		$data = array(
			'nama_mah' => $this->input->post('nama_mah'),
			'nim' => $this->input->post('nim'),
			'asrama' => $this->input->post('asrama'),
			'fakultas' => $this->input->post('fakultas'),
			'gender' => $this->input->post('gender'),
			'tgl_input_mah' => date("Y-m-d"),
		);
		$this->skripsi_model->insert_mahasiswa($data);
		return redirect('Dining/index');
	}
}

