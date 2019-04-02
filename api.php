<?php
require_once 'MyPDO.class.php';
header("Access-Control-Allow-Origin: *");

try 
{
	$conn = new MyPDO ( 'mysql:host=192.168.176.2;dbname=Astro4', 'amallet', 'P@ssw0rd' );
}
catch(Exeption $e)
{
	die('error');
}

$res = [];
$connexion=[];
$register=[];

if ($_GET['action'] == 'all')
{
	$query = $conn->prepare("SELECT IDEVENT 'id_event', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `EVENEMENT` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'concert')
{
	$query = $conn->prepare("SELECT e.IDEVENT 'id', IDLIEUX 'id_lieux', DUREECONC 'duree', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `CONCERT` c INNER JOIN EVENEMENT e ON c.IDEVENT = e.IDEVENT ORDER BY e.IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'expo')
{
	$query = $conn->prepare("SELECT e.IDEVENT 'id', IDLIEUX 'id_lieux', NBJOURS 'nb_jours', DATEFINEXPO 'date_fin_expo', IDPERS 'id_pers', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `EXPO` ex INNER JOIN EVENEMENT e ON ex.IDEVENT = e.IDEVENT ORDER BY e.IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'atelier')
{
	$query = $conn->query("SELECT e.IDEVENT 'id', NBJOURS 'nb_jour', NBMAXPART 'nb_max_participant', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `ATELIER` a INNER JOIN EVENEMENT e ON a.IDEVENT = e.IDEVENT ORDER BY e.IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'conf')
{
	$query = $conn->query("SELECT e.IDEVENT 'id', IDLIEUX 'id_lieux', c.IDPERS 'id_co_pers', DHFCONF 'date_heure_fin',PROBCONF 'problematique',e.IDPERS 'id_pers', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `CONFERENCE` c INNER JOIN EVENEMENT e ON c.IDEVENT = e.IDEVENT ORDER BY e.IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'register')
{
	try {
		$query = $conn->prepare("INSERT INTO PERSONNE (NOMPERS, PRENOMPERS, TELPERS, MAILPERS, LOGINPERS, MDPPERS) VALUE ('".$_GET['nom']."', '".$_GET['prenom']."', '".$_GET['phone']."', '".$_GET['mail']."', '".$_GET['login']."', '".$_GET['password']."')");
		$query->execute();
	
		$query = $conn->prepare("INSERT INTO CLIENT (IDPERS, AGECLI) VALUES ((SELECT MAX(IDPERS) FROM PERSONNE), ".$_GET['age'].")");
		$query->execute();
		$register["register"] = true;
	}
	catch(Exeption $e) {
		$register["register"] = false;
	}
	echo json_encode($register);
}

if ($_GET['action'] == 'login_client')
{
	$query = $conn->prepare("SELECT IDPERS id, NOMPERS nom FROM PERSONNE WHERE LOGINPERS = '".$_GET['login']."' AND MDPPERS = '".$_GET['password']."'");
	$query->execute();
	$result = $query->fetchAll();
	$res['login'] = $result;

	if (empty($res['login']))
	{
		$connexion = 
		[
			'is_valid' => false,
			'non_valid_reason' => 'wrong',
		];
		echo json_encode($connexion);
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM CLIENT WHERE IDPERS = ".$res['login'][0]['id']);
		$query->execute();
		$result = $query->fetchAll();
		$res['client'] = $result;

		if (empty($res['client']))
		{
			$connexion = 
			[
				'is_valid' => false,
				'non_valid_reason' => 'not_client',
			];
			echo json_encode($connexion);
		}
		else
		{
			$connexion = 
			[
				'is_valid' => true,
				'non_valid_reason' => '',
				'id_pers' => $res['login'][0]['id'],
			];
			echo json_encode($connexion);
		}
	}
}

if ($_GET['action'] == 'login_artiste')
{
	$query = $conn->prepare("SELECT IDPERS id, NOMPERS nom FROM PERSONNE WHERE LOGINPERS = '".$_GET['login']."' AND MDPPERS = '".$_GET['password']."'");
	$query->execute();
	$result = $query->fetchAll();
	$res['login'] = $result;

	if (empty($res['login']))
	{
		$connexion = 
		[
			'is_valid' => false,
			'non_valid_reason' => 'wrong',
		];
		echo json_encode($connexion);
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM ARTISTE WHERE IDPERS = ".$res['login'][0]['id']);
		$query->execute();
		$result = $query->fetchAll();
		$res['client'] = $result;

		if (empty($res['client']))
		{
			$connexion = 
			[
				'is_valid' => false,
				'non_valid_reason' => 'not_artist',
			];
			echo json_encode($connexion);
		}
		else
		{
			$connexion = 
			[
				'is_valid' => true,
				'non_valid_reason' => '',
				'id_pers' => $res['login'][0]['id'],
			];
			echo json_encode($connexion);
		}
	}
}

if ($_GET['action'] == 'login_intervenant')
{
	$query = $conn->prepare("SELECT IDPERS id, NOMPERS nom FROM PERSONNE WHERE LOGINPERS = '".$_GET['login']."' AND MDPPERS = '".$_GET['password']."'");
	$query->execute();
	$result = $query->fetchAll();
	$res['login'] = $result;

	if (empty($res['login']))
	{
		$connexion = 
		[
			'is_valid' => false,
			'non_valid_reason' => 'wrong',
		];
		echo json_encode($connexion);
	}
	else
	{
		$query = $conn->prepare("SELECT * FROM INTERVENANT WHERE IDPERS = ".$res['login'][0]['id']);
		$query->execute();
		$result = $query->fetchAll();
		$res['client'] = $result;

		if (empty($res['client']))
		{
			$connexion = 
			[
				'is_valid' => false,
				'non_valid_reason' => 'not_contributor',
			];
			echo json_encode($connexion);
		}
		else
		{
			$connexion = 
			[
				'is_valid' => true,
				'non_valid_reason' => '',
				'id_pers' => $res['login'][0]['id'],
			];
			echo json_encode($connexion);
		}
	}
}

if ($_GET['action'] == 'reservation')
{
	$query = $conn->query("SELECT R.IDEVENT id, NOMEVENT nom, IMGEVENT image FROM RESERVATION R INNER JOIN EVENEMENT E ON R.IDEVENT = E.IDEVENT WHERE R.IDPERS = ".$_GET['idCli']);
	$query->execute();
	$result = $query->fetchAll();
	$res['reservation'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'GetInfoEvent')
{
	$query = $conn->prepare("SELECT IDEVENT 'id_event', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `EVENEMENT` WHERE IDEVENT = ".$_GET['EventID']);
	$query->execute();
	$result = $query->fetchAll();
	$res['InfoEvent'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'RDV')
{
	$query = $conn->query("SELECT NOMEVENT nom_event, DATEVENT date_event, RESEVENT resume_event FROM RESERVATION R INNER JOIN EVENEMENT E ON R.IDEVENT = E.IDEVENT WHERE R.IDPERS = ".$_GET['EventID']);
	$query->execute();
	$result = $query->fetchAll();
	$res['RDV'] = $result;
	echo json_encode($res);
}
die();