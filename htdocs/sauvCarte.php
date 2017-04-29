<?php
	session_start();
	require_once('accessData.php');
	require_once('Carte.php');
	require_once('Noeud.php');
	
	$acc=new accessData;
	echo "1";
	$char='azertyuiopqsdfghjklmwxcvbn987456321';
    do
    {
        $id=str_shuffle($char);
        $id=substr($id,0,8);
    }while(!$acc->idCarte($id));
    
    echo $id." ";
	do
	{
		$idnode=str_shuffle($char);
		$idnode=substr($idnode,0,8);
	}while(!$acc->idNoeud($id));
    echo $idnode;
	$carte=$acc->addCarte($_POST['nom'],$_POST['nomNoeud'],$id, $idnode, $_POST['acces']);
	echo "4";
	$i=0;
	$truc="uti$i";
	$bidule="role$i";
	while(isset($_POST[$truc]))
	{
		$acc->addEdit($id, $_POST[$truc],$_POST[$bidule]);
		$i=$i+1;
		$truc="uti$i";
		$bidule="role$i";
	}
	
	$acc->addEdit($id,$_SESSION['user'],'administrateur');
	echo "5";
?>
