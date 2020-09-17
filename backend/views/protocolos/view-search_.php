<?php
$SQL       = new Connect();
$Protocolo = Functions::seg_($_POST['protocolos']);
$Laudo     = $SQL -> Consultar("SELECT * FROM protocolos WHERE _protocolo = '$Protocolo'");
$Laudos    = mysql_num_rows($Laudo);
?>
<!-- Resultado da Busca para Cadastro de Laudos -->
<table id="sorter" class="tablesorter" cellpadding="1">
<thead>
<tr>
	<th width="20%" scope="col" align="center">Cadastrar Laudos</th>
	<th width="25%" scope="col">Paciente</th>
	<th width="25%" scope="col">Ra&ccedil;a</th>
	<th width="10%" scope="col">Sexo</th>
	<th width="10%" scope="col">Senha</th>
</tr>
</thead>
<tfoot>
<tr>
	<th width="20%" scope="col" align="center">Cadastrar Laudos</th>
	<th width="25%" scope="col">Paciente</th>
	<th width="25%" scope="col">Ra&ccedil;a</th>
	<th width="10%" scope="col">Sexo</th>
	<th width="10%" scope="col">Senha</th>
</tr>
</tfoot>
<tbody>
<?php
if($Laudos)
{
	while($Listar= mysql_fetch_array($Laudo))
	{
		?>
		<tr>
		<td align="center"><a href="<?php echo LMPaginas::Listar('cadastrar',$Listar['protocolo_id']);?>" title="Protocolo: <?php echo $Listar['_protocolo'];?>"><?php echo $Listar['_protocolo'];?></a></td>
		<td><?php echo $Listar['_paciente']; ?></td>
		<td><?php echo $Listar['_raca']; ?></td>
		<td align="center"><?php echo $Listar['_genero']; ?></td>
		<td align="center" class="codigo"><?php echo $Listar['_senha'];?></td>
		</tr>
		<?php
	}
}
else
{
	?>
	<tr>
	<td colspan="7" align="center"><strong>Protocolo n&atilde;o Cadastrado</strong></td>
	</tr>
	<?php
}

?>
</tbody>

</table>

<br />

<?php

if($Laudos)
{

?>

<table id="sorter" class="tablesorter" cellpadding="1">

<thead>

	<tr>
    <th width="10%" scope="col">Visualizar</th>
	<th width="20%" scope="col">Paciente</th>
	<th width="10%" scope="col">Sexo</th>
	<th width="20%" scope="col">Cl&iacute;nica</th>
	<th width="10%" scope="col">Solicitado</th>
	<th width="10%" scope="col">Concluido</th>
	<th width="10%" scope="col">Excluir</th>
	</tr>

</thead>

<tfoot>

	<tr>
    <th width="10%" scope="col">Visualizar</th>
	<th width="20%" scope="col">Paciente</th>
	<th width="10%" scope="col">Sexo</th>
	<th width="20%" scope="col">Cl&iacute;nica</th>
	<th width="10%" scope="col">Solicitado</th>
	<th width="10%" scope="col">Concluido</th>
	<th width="10%" scope="col">Excluir</th>
	</tr>

</tfoot>

<tbody>

<?php
	// Aviso
	$aviso = 0;
	// Lista o Indice do Protocolo
	$l  = $SQL -> Consultar("SELECT * FROM protocolos WHERE _protocolo = '$Protocolo'");
	$ls = mysql_fetch_array($l);
	$i  = $ls[protocolo_id];
	$p  = $ls[_protocolo];
	$d  = $ls[_data];
	$p_ = $ls[_paciente];
	$g  = $ls[_genero];
	$c  = $ls[_clinica_titulo];
	
	// Anatomia Patol�gica
	$citopatologia  = $SQL -> Consultar("SELECT * FROM laudos_ap_citopatologia WHERE _laudo = '$i'");
	$citopatologias = mysql_num_rows($citopatologia);
	if($citopatologias)
	{
		while($listar = mysql_fetch_array($citopatologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ap_citopatologia\" c_t=\"excluir\" c_t_v=\"citopatologia\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Citopatologia</strong></td>
			</tr>
			<tr>
			<td align="center"><a href="<?php echo LMPaginas::Listar('citopatologia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$citopatologia_vaginal  = $SQL -> Consultar("SELECT * FROM laudos_ap_citopatologia_vaginal WHERE _laudo = '$i'");
	$citopatologia_vaginals = mysql_num_rows($citopatologia_vaginal);
	if($citopatologia_vaginals)
	{
		while($listar = mysql_fetch_array($citopatologia_vaginal))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ap_citopatologia_vaginal\" c_t=\"excluir\" c_t_v=\"citopatologia_vaginal\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Citopatologia Vaginal</strong></td>
			</tr>
			<tr>
			<td align="center"><a href="<?php echo LMPaginas::Listar('citopatologia_vaginal_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$histopatologia  = $SQL -> Consultar("SELECT * FROM laudos_ap_histopatologia WHERE _laudo = '$i'");
	$histopatologias = mysql_num_rows($histopatologia);
	if($histopatologias)
	{
		while($listar = mysql_fetch_array($histopatologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ap_histopatologia\" c_t=\"excluir\" c_t_v=\"histopatologia\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Histopatologia</strong></td>
			</tr>
			<tr>
			<td align="center"><a href="<?php echo LMPaginas::Listar('histopatologia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$necropsia  = $SQL -> Consultar("SELECT * FROM laudos_ap_necropsia WHERE _laudo = '$i'");
	$necropsias = mysql_num_rows($necropsia);
	if($necropsias)
	{
		while($listar = mysql_fetch_array($necropsia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ap_necropsia\" c_t=\"excluir\" c_t_v=\"necropsia\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Necropsia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('necropsia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Diagn�sticos por Imagem
	$endoscopia  = $SQL -> Consultar("SELECT * FROM laudos_di_endoscopia WHERE _laudo = '$i'");
	$endoscopias = mysql_num_rows($endoscopia);
	if($endoscopias)
	{
		while($listar = mysql_fetch_array($endoscopia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_endoscopia\" c_t=\"excluir\" c_t_v=\"endoscopia\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Endoscopia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('endoscopia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$raio_x  = $SQL -> Consultar("SELECT * FROM laudos_di_raio_x WHERE _laudo = '$i'");
	$raio_xs = mysql_num_rows($raio_x);
	if($raio_xs)
	{
		while($listar = mysql_fetch_array($raio_x))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_raio_x\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Raio-x</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('raio_x_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$raio_x_contrastado  = $SQL -> Consultar("SELECT * FROM laudos_di_raio_x_contrastado WHERE _laudo = '$i'");
	$raio_x_contrastados = mysql_num_rows($raio_x_contrastado);
	if($raio_x_contrastados)
	{
		while($listar = mysql_fetch_array($raio_x_contrastado))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_raio_x_contrastado\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Raio-x Contrastado</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('raio_x_contrastado_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_aparelho_feminino  = $SQL -> Consultar("SELECT * FROM laudos_di_us_aparelho_feminino WHERE _laudo = '$i'");
	$us_aparelho_femininos = mysql_num_rows($us_aparelho_feminino);
	if($us_aparelho_femininos)
	{
		while($listar = mysql_fetch_array($us_aparelho_feminino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_aparelho_feminino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US Aparelho Feminino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_aparelho_feminino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_estrutura  = $SQL -> Consultar("SELECT * FROM laudos_di_us_estruturas WHERE _laudo = '$i'");
	$us_estruturas = mysql_num_rows($us_estrutura);
	if($us_estruturas)
	{
		while($listar = mysql_fetch_array($us_estrutura))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_estruturas\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US Estrutura</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_estruturas_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_exploratoria  = $SQL -> Consultar("SELECT * FROM laudos_di_us_exploratoria WHERE _laudo = '$i'");
	$us_exploratorias = mysql_num_rows($us_exploratoria);
	if($us_exploratorias)
	{
		while($listar = mysql_fetch_array($us_exploratoria))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_exploratoria\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US Explorat&oacute;ria</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_exploratoria_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_gestacional  = $SQL -> Consultar("SELECT * FROM laudos_di_us_gestacional WHERE _laudo = '$i'");
	$us_gestacionals = mysql_num_rows($us_gestacional);
	if($us_gestacionals)
	{
		while($listar = mysql_fetch_array($us_gestacional))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_gestacional\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US Gestacional</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_gestacional_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_obstetrica  = $SQL -> Consultar("SELECT * FROM laudos_di_us_obstetrica WHERE _laudo = '$i'");
	$us_obstetricas = mysql_num_rows($us_obstetrica);
	if($us_obstetricas)
	{
		while($listar = mysql_fetch_array($us_obstetrica))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_obstetrica\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US Obst&eacute;trica</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_obstetrica_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$us_pos_parto  = $SQL -> Consultar("SELECT * FROM laudos_di_us_pos_parto WHERE _laudo = '$i'");
	$us_pos_partos = mysql_num_rows($us_pos_parto);
	if($us_pos_partos)
	{
		while($listar = mysql_fetch_array($us_pos_parto))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_di_us_pos_parto\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>US P&oacute;s Parto</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('us_pos_parto_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Medicina Laboratorial
	
	// An�lise de L�quidos Cavit�rios
	$ascitico  = $SQL -> Consultar("SELECT * FROM laudos_ml_al_ascitico WHERE _laudo = '$i'");
	$asciticos = mysql_num_rows($ascitico);
	if($asciticos)
	{
		while($listar = mysql_fetch_array($ascitico))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_al_ascitico\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>AL Ascitico</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('al_ascitico_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$liquor  = $SQL -> Consultar("SELECT * FROM laudos_ml_al_liquor WHERE _laudo = '$i'");
	$liquors = mysql_num_rows($liquor);
	if($liquors)
	{
		while($listar = mysql_fetch_array($liquor))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_al_liquor\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>AL Liquor</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('al_liquor_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$pericardio  = $SQL -> Consultar("SELECT * FROM laudos_ml_al_pericardio WHERE _laudo = '$i'");
	$pericardios = mysql_num_rows($pericardio);
	if($pericardios)
	{
		while($listar = mysql_fetch_array($pericardio))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_al_pericardio\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>AL Pericardio</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('al_pericardio_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$pleural  = $SQL -> Consultar("SELECT * FROM laudos_ml_al_pleural WHERE _laudo = '$i'");
	$pleurals = mysql_num_rows($pleural);
	if($pleurals)
	{
		while($listar = mysql_fetch_array($pleural))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_al_pleural\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>AL Pleural</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('al_pleural_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$sinovial  = $SQL -> Consultar("SELECT * FROM laudos_ml_al_sinovial WHERE _laudo = '$i'");
	$sinovials = mysql_num_rows($sinovial);
	if($sinovials)
	{
		while($listar = mysql_fetch_array($sinovial))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_al_sinovial\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>AL Sinovial</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('al_sinovial_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Biologia Molecular
	$biologia  = $SQL -> Consultar("SELECT * FROM laudos_ml_biologia_molecular WHERE _laudo = '$i'");
	$biologias = mysql_num_rows($biologia);
	if($biologias)
	{
		while($listar = mysql_fetch_array($biologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_biologia_molecular\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Biologia Molecular</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('biologia_molecular_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Bioquimica
	$bioquimica  = $SQL -> Consultar("SELECT * FROM laudos_ml_bioquimica WHERE _laudo = '$i'");
	$bioquimicas = mysql_num_rows($bioquimica);
	if($bioquimicas)
	{
		while($listar = mysql_fetch_array($bioquimica))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_bioquimica\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Bioqu�mica</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('bioquimica_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Doen�as Gen�ticas
	$doenca  = $SQL -> Consultar("SELECT * FROM laudos_ml_doencas_geneticas WHERE _laudo = '$i'");
	$doencas = mysql_num_rows($doenca);
	if($doencas)
	{
		while($listar = mysql_fetch_array($doenca))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_doencas_geneticas\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Doen&ccedil;as Gen&eacute;ticas</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('doencas_geneticas_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Drogas
	$brometo  = $SQL -> Consultar("SELECT * FROM laudos_ml_dg_brometo_de_potassio WHERE _laudo = '$i'");
	$brometos = mysql_num_rows($brometo);
	if($brometos)
	{
		while($listar = mysql_fetch_array($brometo))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_dg_brometo_de_potassio\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Brometo de Pot&aacute;ssio</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('brometo_de_potassio_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$digoxina  = $SQL -> Consultar("SELECT * FROM laudos_ml_dg_digoxina WHERE _laudo = '$i'");
	$digoxinas = mysql_num_rows($digoxina);
	if($digoxinas)
	{
		while($listar = mysql_fetch_array($digoxina))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_dg_digoxina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Digoxina</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('digoxina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$fenobarbital  = $SQL -> Consultar("SELECT * FROM laudos_ml_dg_fenobarbital WHERE _laudo = '$i'");
	$fenobarbitals = mysql_num_rows($fenobarbital);
	if($fenobarbitals)
	{
		while($listar = mysql_fetch_array($fenobarbital))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_dg_fenobarbital\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Fenobarbital</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('fenobarbital_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}

	// Endocrinologia
	$e_endocrinologia  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_endocrinologia WHERE _laudo = '$i'");
	$e_endocrinologias = mysql_num_rows($e_endocrinologia);
	if($e_endocrinologias)
	{
		while($listar = mysql_fetch_array($e_endocrinologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_endocrinologia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Endocrinologia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('endocrinologias_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_endocrinologia_ria  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_endocrinologia_ria WHERE _laudo = '$i'");
	$e_endocrinologia_rias = mysql_num_rows($e_endocrinologia_ria);
	if($e_endocrinologia_rias)
	{
		while($listar = mysql_fetch_array($e_endocrinologia_ria))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_endocrinologia_ria\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Endocrinologia RIA</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('endocrinologias_ria_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_relatorio  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_relatorio_de_exames WHERE _laudo = '$i'");
	$e_relatorios = mysql_num_rows($e_relatorio);
	if($e_relatorios)
	{
		while($listar = mysql_fetch_array($e_relatorio))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_relatorio_de_exames\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Relat�rio de Exames</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('relatorio_de_exames_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_teste_de_estimulacao_com_acth  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_teste_de_estimulacao_com_acth WHERE _laudo = '$i'");
	$e_teste_de_estimulacao_com_acths = mysql_num_rows($e_teste_de_estimulacao_com_acth);
	if($e_teste_de_estimulacao_com_acths)
	{
		while($listar = mysql_fetch_array($e_teste_de_estimulacao_com_acth))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_teste_de_estimulacao_com_acth\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Teste de Estimula&ccedil;&atilde;o com ACTH</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('teste_de_estimulacao_com_acth_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_teste_de_supressao_i  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_teste_de_supressao_i WHERE _laudo = '$i'");
	$e_teste_de_supressao_is = mysql_num_rows($e_teste_de_supressao_i);
	if($e_teste_de_supressao_is)
	{
		while($listar = mysql_fetch_array($e_teste_de_supressao_i))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_teste_de_supressao_i\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Teste de Supress&atilde;o</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('teste_de_supressao_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_teste_de_supressao_ii  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_teste_de_supressao_ii WHERE _laudo = '$i'");
	$e_teste_de_supressao_iis = mysql_num_rows($e_teste_de_supressao_ii);
	if($e_teste_de_supressao_iis)
	{
		while($listar = mysql_fetch_array($e_teste_de_supressao_ii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_teste_de_supressao_ii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Teste de Supress&atilde;o</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('teste_de_supressao_ii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$e_teste_de_supressao_iii  = $SQL -> Consultar("SELECT * FROM laudos_ml_e_teste_de_supressao_iii WHERE _laudo = '$i'");
	$e_teste_de_supressao_iiis = mysql_num_rows($e_teste_de_supressao_iii);
	if($e_teste_de_supressao_iiis)
	{
		while($listar = mysql_fetch_array($e_teste_de_supressao_iii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_e_teste_de_supressao_iii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Teste de Supress&atilde;o</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('teste_de_supressao_iii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Genetica
	$genetica  = $SQL -> Consultar("SELECT * FROM laudos_ml_genetica WHERE _laudo = '$i'");
	$geneticas = mysql_num_rows($genetica);
	if($geneticas)
	{
		while($listar = mysql_fetch_array($genetica))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_genetica\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Gen&eacute;tica</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('genetica_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Hematologia
	$plaqueta  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_contagem_de_plaquetas WHERE _laudo = '$i'");
	$plaquetas = mysql_num_rows($plaqueta);
	if($plaquetas)
	{
		while($listar = mysql_fetch_array($plaqueta))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_contagem_de_plaquetas\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Contagem de Plaquetas</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('contagem_de_plaquetas_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$reticulocito  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_contagem_de_reticulocitos WHERE _laudo = '$i'");
	$reticulocitos = mysql_num_rows($reticulocito);
	if($reticulocitos)
	{
		while($listar = mysql_fetch_array($reticulocito))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_contagem_de_reticulocitos\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Contagem de Reticulocitos</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('contagem_de_reticulocitos_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$eritrograma  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_eritrograma WHERE _laudo = '$i'");
	$eritrogramas = mysql_num_rows($eritrograma);
	if($eritrogramas)
	{
		while($listar = mysql_fetch_array($eritrograma))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_eritrograma\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Eritrograma</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('eritrograma_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$fibrogenio  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_fibrogenio WHERE _laudo = '$i'");
	$fibrogenios = mysql_num_rows($fibrogenio);
	if($fibrogenios)
	{
		while($listar = mysql_fetch_array($fibrogenio))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_fibrogenio\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Fibrog&ecirc;nio</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('fibrogenio_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hematocrito  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hematocrito WHERE _laudo = '$i'");
	$hematocritos = mysql_num_rows($hematocrito);
	if($hematocritos)
	{
		while($listar = mysql_fetch_array($hematocrito))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hematocrito\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemat�crito</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hematocrito_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_bovino  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_bovino WHERE _laudo = '$i'");
	$hemograma_bovinos = mysql_num_rows($hemograma_bovino);
	if($hemograma_bovinos)
	{
		while($listar = mysql_fetch_array($hemograma_bovino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_bovino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma Bovino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_bovino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_caprino  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_caprino WHERE _laudo = '$i'");
	$hemograma_caprinos = mysql_num_rows($hemograma_caprino);
	if($hemograma_caprinos)
	{
		while($listar = mysql_fetch_array($hemograma_caprino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_caprino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma Caprino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_caprino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_equino  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_equino WHERE _laudo = '$i'");
	$hemograma_equinos = mysql_num_rows($hemograma_equino);
	if($hemograma_equinos)
	{
		while($listar = mysql_fetch_array($hemograma_equino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_equino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma Equino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_equino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_i  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_i WHERE _laudo = '$i'");
	$hemograma_is = mysql_num_rows($hemograma_i);
	if($hemograma_is)
	{
		while($listar = mysql_fetch_array($hemograma_i))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_i\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma I</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_i_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_ii  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_ii WHERE _laudo = '$i'");
	$hemograma_iis = mysql_num_rows($hemograma_ii);
	if($hemograma_iis)
	{
		while($listar = mysql_fetch_array($hemograma_ii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_ii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma II</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_ii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_iii  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_iii WHERE _laudo = '$i'");
	$hemograma_iiis = mysql_num_rows($hemograma_iii);
	if($hemograma_iiis)
	{
		while($listar = mysql_fetch_array($hemograma_iii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_iii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma III</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_iii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hemograma_ovino  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_hemograma_ovino WHERE _laudo = '$i'");
	$hemograma_ovinos = mysql_num_rows($hemograma_ovino);
	if($hemograma_ovino)
	{
		while($listar = mysql_fetch_array($hemograma_ovino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_hemograma_ovino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Hemograma Ovino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('hemograma_ovino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$kit_hematozoario  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_kit_hematozoarios WHERE _laudo = '$i'");
	$kit_hematozoarios = mysql_num_rows($kit_hematozoario);
	if($kit_hematozoarios)
	{
		while($listar = mysql_fetch_array($kit_hematozoario))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_kit_hematozoarios\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Kit Hematozoarios</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('kit_hematozoarios_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$leucograma  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_leucograma WHERE _laudo = '$i'");
	$leucogramas = mysql_num_rows($leucograma);
	if($leucogramas)
	{
		while($listar = mysql_fetch_array($leucograma))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_leucograma\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Leucograma</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('leucograma_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$lentz  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ps_de_corpusculo_de_lentz WHERE _laudo = '$i'");
	$lentzs = mysql_num_rows($lentz);
	if($lentzs)
	{
		while($listar = mysql_fetch_array($lentz))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ps_de_corpusculo_de_lentz\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Corp&uacute;sculo de Lentz</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de_corpusculo_de_lentz_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hematozoario_i  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ps_de_hematozoarios_i WHERE _laudo = '$i'");
	$hematozoario_is = mysql_num_rows($hematozoario_i);
	if($hematozoario_is)
	{
		while($listar = mysql_fetch_array($hematozoario_i))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ps_de_hematozoarios_i\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Hematozo&aacute;rios</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de_hematozoarios_i_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$hematozoario_ii  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ps_de_hematozoarios_ii WHERE _laudo = '$i'");
	$hematozoario_iis = mysql_num_rows($hematozoario_ii);
	if($hematozoario_iis)
	{
		while($listar = mysql_fetch_array($hematozoario_ii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ps_de_hematozoarios_ii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Hematozo&aacute;rios Equino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de_hematozoarios_ii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$microfilaria  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ps_de_microfilarias WHERE _laudo = '$i'");
	$microfilarias = mysql_num_rows($microfilaria);
	if($microfilarias)
	{
		while($listar = mysql_fetch_array($microfilaria))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ps_de_microfilarias\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Microfilarias</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de_microfilarias_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$ehrlichiose  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ps_de_ehrlichiose WHERE _laudo = '$i'");
	$ehrlichioses = mysql_num_rows($ehrlichiose);
	if($ehrlichioses)
	{
		while($listar = mysql_fetch_array($ehrlichiose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ps_de_ehrlichiose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Ehrlichiose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de_ehrlichiose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$tap  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_tap WHERE _laudo = '$i'");
	$taps = mysql_num_rows($tap);
	if($taps)
	{
		while($listar = mysql_fetch_array($tap))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_tap\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>TAP</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('tap_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$ttp  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_ttp WHERE _laudo = '$i'");
	$ttps = mysql_num_rows($ttp);
	if($ttps)
	{
		while($listar = mysql_fetch_array($ttp))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_ttp\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>TTP</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ttp_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$vhs  = $SQL -> Consultar("SELECT * FROM laudos_ml_h_vhs WHERE _laudo = '$i'");
	$vhss = mysql_num_rows($vhs);
	if($vhss)
	{
		while($listar = mysql_fetch_array($vhs))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_h_vhs\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>VHS</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('vhs_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Imunologia
	$brucelose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_brucelose WHERE _laudo = '$i'");
	$bruceloses = mysql_num_rows($brucelose);
	if($bruceloses)
	{
		while($listar = mysql_fetch_array($brucelose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_brucelose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Brucelose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('brucelose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$cinomose_ifi  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_cinomose_ifi WHERE _laudo = '$i'");
	$cinomose_ifis = mysql_num_rows($cinomose_ifi);
	if($cinomose_ifis)
	{
		while($listar = mysql_fetch_array($cinomose_ifi))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_cinomose_ifi\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Cinomose IFI</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cinomose_ifi_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$cinomose_sorologia  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_cinomose_sorologia WHERE _laudo = '$i'");
	$cinomose_sorologias = mysql_num_rows($cinomose_sorologia);
	if($cinomose_sorologias)
	{
		while($listar = mysql_fetch_array($cinomose_sorologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_cinomose_sorologia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Cinomose Sorologia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cinomose_sorologia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$cinomose_teste  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_cinomose_teste WHERE _laudo = '$i'");
	$cinomose_testes = mysql_num_rows($cinomose_teste);
	if($cinomose_testes)
	{
		while($listar = mysql_fetch_array($cinomose_teste))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_cinomose_teste\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Cinomose Teste</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cinomose_teste_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$dirofilariose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_dirofilariose WHERE _laudo = '$i'");
	$dirofilarioses = mysql_num_rows($dirofilariose);
	if($dirofilarioses)
	{
		while($listar = mysql_fetch_array($dirofilariose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_dirofilariose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Dirofilariose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('dirofilariose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$fiv_felv  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_fiv_felv WHERE _laudo = '$i'");
	$fiv_felvs = mysql_num_rows($fiv_felv);
	if($fiv_felvs)
	{
		while($listar = mysql_fetch_array($fiv_felv))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_fiv_felv\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Fiv Felv</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('fiv_felv_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$giardia  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_giardia WHERE _laudo = '$i'");
	$giardias = mysql_num_rows($giardia);
	if($giardias)
	{
		while($listar = mysql_fetch_array($giardia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_giardia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Gi�rdia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('giardia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$leishmaniose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_leishmaniose WHERE _laudo = '$i'");
	$leishmanioses = mysql_num_rows($leishmaniose);
	if($leishmanioses)
	{
		while($listar = mysql_fetch_array($leishmaniose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_leishmaniose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Leishmaniose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('leishmaniose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$leptospirose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_leptospirose WHERE _laudo = '$i'");
	$leptospiroses = mysql_num_rows($leptospirose);
	if($leptospiroses)
	{
		while($listar = mysql_fetch_array($leptospirose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_leptospirose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Leptospirose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('leptospirose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$parvovirose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_parvovirose WHERE _laudo = '$i'");
	$parvoviroses = mysql_num_rows($parvovirose);
	if($parvoviroses)
	{
		while($listar = mysql_fetch_array($parvovirose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_parvovirose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Parvovirose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('parvovirose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$pif  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_pif WHERE _laudo = '$i'");
	$pifs = mysql_num_rows($pif);
	if($pifs)
	{
		while($listar = mysql_fetch_array($pif))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_pif\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Pif</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('pif_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$toxoplasmose  = $SQL -> Consultar("SELECT * FROM laudos_ml_i_toxoplasmose WHERE _laudo = '$i'");
	$toxoplasmoses = mysql_num_rows($toxoplasmose);
	if($toxoplasmoses)
	{
		while($listar = mysql_fetch_array($toxoplasmose))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_i_toxoplasmose\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Toxoplasmose</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('toxoplasmose_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Microbiologia
	$m_cultura  = $SQL -> Consultar("SELECT * FROM laudos_ml_m_cultura WHERE _laudo = '$i'");
	$m_culturas = mysql_num_rows($m_cultura);
	if($m_culturas)
	{
		while($listar = mysql_fetch_array($m_cultura))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_m_cultura\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Microbiologia Cultura e Antibiograma</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cultura_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$m_cultura_f  = $SQL -> Consultar("SELECT * FROM laudos_ml_m_cultura_fungica WHERE _laudo = '$i'");
	$m_cultura_fs = mysql_num_rows($m_cultura_f);
	if($m_cultura_fs)
	{
		while($listar = mysql_fetch_array($m_cultura_f))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_m_cultura_fungica\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Microbiologia Cultura F&uacute;ngica</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cultura_fungica_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$m_cultura_u  = $SQL -> Consultar("SELECT * FROM laudos_ml_m_cultura_urina WHERE _laudo = '$i'");
	$m_cultura_us = mysql_num_rows($m_cultura_u);
	if($m_cultura_us)
	{
		while($listar = mysql_fetch_array($m_cultura_u))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_m_cultura_urina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Microbiologia Cultura Urina e Antibiograma Veterin&aacute;rio</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('cultura_urina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Microscopia Eletr�nica
	$microscopia  = $SQL -> Consultar("SELECT * FROM laudos_ml_microscopia_eletronica WHERE _laudo = '$i'");
	$microscopias = mysql_num_rows($microscopia);
	if($microscopias)
	{
		while($listar = mysql_fetch_array($microscopia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_microscopia_eletronica\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Microscopia Eletr&ocirc;nica</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('microscopia_eletronica_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Lipase Imuno Reativa Canina
	$lipase_imuno_reativa_canina  = $SQL -> Consultar("SELECT * FROM laudos_ml_lipase_imuno_reativa_canina WHERE _laudo = '$i'");
	$lipase_imuno_reativa_caninas = mysql_num_rows($lipase_imuno_reativa_canina);
	if($lipase_imuno_reativa_caninas)
	{
		while($listar = mysql_fetch_array($lipase_imuno_reativa_canina))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_lipase_imuno_reativa_canina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Lipase Imuno Reativa Canina</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('lipase_imuno_reativa_canina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Parasitol�gico
	$coprologico  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_coprologico WHERE _laudo = '$i'");
	$coprologicos = mysql_num_rows($coprologico);
	if($coprologicos)
	{
		while($listar = mysql_fetch_array($coprologico))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_coprologico\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Coprologico Funcional</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('coprologico_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$coproparasitologico_i  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_coproparasitologico_i WHERE _laudo = '$i'");
	$coproparasitologico_is = mysql_num_rows($coproparasitologico_i);
	if($coproparasitologico_is)
	{
		while($listar = mysql_fetch_array($coproparasitologico_i))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_coproparasitologico_i\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Coproparasitologico</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('coproparasitologico_i_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$coproparasitologico_ii  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_coproparasitologico_ii WHERE _laudo = '$i'");
	$coproparasitologico_iis = mysql_num_rows($coproparasitologico_ii);
	if($coproparasitologico_iis)
	{
		while($listar = mysql_fetch_array($coproparasitologico_ii))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_coproparasitologico_ii\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Coproparasitologico Equino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('coproparasitologico_ii_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$ectoparasita  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_ectoparasitas WHERE _laudo = '$i'");
	$ectoparasitas = mysql_num_rows($ectoparasita);
	if($ectoparasitas)
	{
		while($listar = mysql_fetch_array($ectoparasita))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_ectoparasitas\" c_t=\"excluir\" c_t_v=\"ectoparasitas\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Ectoparasita</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ectoparasitas_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$parasitologia  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_parasitologia WHERE _laudo = '$i'");
	$parasitologias = mysql_num_rows($parasitologia);
	if($parasitologias)
	{
		while($listar = mysql_fetch_array($parasitologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
		$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
		$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_parasitologia\" c_t=\"excluir\" c_t_v=\"775\"";
		$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
		$aviso     = 1;
		?>
		<tr>
		<td colspan="7"><strong>Parasitologia</strong></td>
		</tr>
		<tr>
		<td align="center">
		<a href="<?php echo LMPaginas::Listar('parasitologia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$_sangue_oculto  = $SQL -> Consultar("SELECT * FROM laudos_ml_p_ps_de_sangue_oculto WHERE _laudo = '$i'");
	$_sangue_ocultos = mysql_num_rows($_sangue_oculto);
	if($_sangue_ocultos)
	{
		while($listar = mysql_fetch_array($_sangue_oculto))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_p_ps_de__sangue_oculto\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>PS de Sangue Oculto</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('ps_de__sangue_oculto_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Teste de Alergia
	$alergia  = $SQL -> Consultar("SELECT * FROM laudos_ml_teste_de_alergia WHERE _laudo = '$i'");
	$alergias = mysql_num_rows($alergia);
	if($alergias)
	{
		while($listar = mysql_fetch_array($alergia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_teste_de_alergia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Teste de Alergia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('teste_de_alergia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Toxicologico
	$toxicologico  = $SQL -> Consultar("SELECT * FROM laudos_ml_toxicologico WHERE _laudo = '$i'");
	$toxicologicos = mysql_num_rows($toxicologico);
	if($toxicologicos)
	{
		while($listar = mysql_fetch_array($toxicologico))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_toxicologico\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Toxicologico</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('toxicologico_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Urin�lise
	$analise_fisico  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_analise_fisico WHERE _laudo = '$i'");
	$analise_fisicos = mysql_num_rows($analise_fisico);
	if($analise_fisicos)
	{
		while($listar = mysql_fetch_array($analise_fisico))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_analise_fisico\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>An�lise F�sico Qu�mico</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('analise_fisico_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$calcio_creatinina  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_calcio_creatinina WHERE _laudo = '$i'");
	$calcio_creatininas = mysql_num_rows($calcio_creatinina);
	if($calcio_creatininas)
	{
		while($listar = mysql_fetch_array($calcio_creatinina))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_calcio_creatinina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Calcio Creatinina</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('calcio_creatinina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$densidade  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_densidade WHERE _laudo = '$i'");
	$densidades = mysql_num_rows($densidade);
	if($densidades)
	{
		while($listar = mysql_fetch_array($densidade))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_densidade\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Densidade</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('densidade_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$parcial  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_parcial_de_urina WHERE _laudo = '$i'");
	$parcials = mysql_num_rows($parcial);
	if($parcials)
	{
		while($listar = mysql_fetch_array($parcial))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_parcial_de_urina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Parcial de Urina</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('parcial_de_urina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$u_parcial_de_urina_equino  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_parcial_de_urina_equino WHERE _laudo = '$i'");
	$u_parcial_de_urina_equinos = mysql_num_rows($u_parcial_de_urina_equino);
	if($u_parcial_de_urina_equinos)
	{
		while($listar = mysql_fetch_array($u_parcial_de_urina_equino))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_parcial_de_urina_equino\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Parcial de Urina Equino</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('parcial_de_urina_equino_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$proteina_creatinina  = $SQL -> Consultar("SELECT * FROM laudos_ml_u_proteina_creatinina WHERE _laudo = '$i'");
	$proteina_creatininas = mysql_num_rows($proteina_creatinina);
	if($proteina_creatininas)
	{
		while($listar = mysql_fetch_array($proteina_creatinina))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_u_proteina_creatinina\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Prote�na Creatinina</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('proteina_creatinina_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$transcrever  = $SQL -> Consultar("SELECT * FROM laudos_ml_transcrever_exames WHERE _laudo = '$i'");
	$transcrevers = mysql_num_rows($transcrever);
	if($transcrevers)
	{
		while($listar = mysql_fetch_array($transcrever))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_ml_transcrever_exames\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Outros Exames</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('transcrever_exames_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	
	// Procedimentos Gerais
	$acupuntura  = $SQL -> Consultar("SELECT * FROM laudos_sc_acupuntura WHERE _laudo = '$i'");
	$acupunturas = mysql_num_rows($acupuntura);
	if($acupunturas)
	{
		while($listar = mysql_fetch_array($acupuntura))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_sc_acupuntura\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Acupuntura</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('acupuntura_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$eletrocardiograma  = $SQL -> Consultar("SELECT * FROM laudos_sc_eletrocardiograma WHERE _laudo = '$i'");
	$eletrocardiogramas = mysql_num_rows($eletrocardiograma);
	if($eletrocardiogramas)
	{
		while($listar = mysql_fetch_array($eletrocardiograma))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_sc_eletrocardiograma\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Eletrocardiograma</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('eletrocardiograma_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$endocrinologia  = $SQL -> Consultar("SELECT * FROM laudos_sc_endocrinologia WHERE _laudo = '$i'");
	$endocrinologias = mysql_num_rows($endocrinologia);
	if($endocrinologias)
	{
		while($listar = mysql_fetch_array($endocrinologia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_sc_endocrinologia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Endocrinologia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('endocrinologia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$fisioterapia  = $SQL -> Consultar("SELECT * FROM laudos_sc_fisioterapia WHERE _laudo = '$i'");
	$fisioterapias = mysql_num_rows($fisioterapia);
	if($fisioterapias)
	{
		while($listar = mysql_fetch_array($fisioterapia))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_sc_fisioterapia\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>Fisioterapia</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('fisioterapia_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	$mpas  = $SQL -> Consultar("SELECT * FROM laudos_sc_mpas WHERE _laudo = '$i'");
	$mpass = mysql_num_rows($mpas);
	if($mpass)
	{
		while($listar = mysql_fetch_array($mpas))
		{
			$solicitado= Functions::retorna_data('-','/',$d);
			$concluido = Functions::retorna_data('-','/',$listar[_concluido]);
			$excluir   = "<a href=\"excluir\" t_t=\"laudos_sc_mpas\" c_t=\"excluir\" c_t_v=\"775\"";
			$excluir  .= " c_i=\"_id\" c_i_v=\"$listar[_id]\" title=\"Excluir Laudo\">Excluir</a>";
			$aviso     = 1;
			?>
			<tr>
			<td colspan="7"><strong>MPAs</strong></td>
			</tr>
			<tr>
			<td align="center">
			<a href="<?php echo LMPaginas::Listar('mpas_visualizar',$i);?>"><?php echo $p;?></a></td>
			<td><?php echo $p_; ?></td>
			<td><?php echo $g; ?></td>
			<td><?php echo $c; ?></td>
			<td align="center"><?php echo $solicitado; ?></td>
			<td align="center"><?php echo $concluido;?></td>
			<td align="center"><?php echo $excluir;?></td>
			</tr>
			<?php
		}
	}
	if($aviso == 0)
	{
		?>
		<tr>
		<td colspan="7" align="center"><strong>Protocolo sem Laudos Cadastrados</strong></td>
		</tr>
		<?php
	}	
?>
</tbody>
</table>
<?php
}
?>
</body>
</html>