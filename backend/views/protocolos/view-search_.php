<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
//
use backend\models\Protocolos;
//
$protocolo = Protocolos::find()
->where(['id' => $model->id])
->with([
    'laudosApCitopatologia',
    'laudosApCitopatologiaVaginal',
    'laudosApHistopatologia',
    'laudosDiEndoscopia',
    'laudosDiRaioX',
    'laudosDiRaioXContrastado',
    'laudosDiUsAparelhoFeminino',
    'laudosDiUsEstrutura',
    'laudosDiUsExploratoria',
    'laudosDiUsGestacional',
    'laudosDiUsObstetrica',
    'laudosDiUsPosParto',
])->one();
// Variável para exibir se há ou não laudos para impressão
$readyToPrint = 0;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider
$this->title = 'Imprimir Protocolos';
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
 */
?>

<div class="protocolos-index">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8"> TITULO DO LAUDO </div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
		<div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
		<!-- Optional: clear the XS cols if their content doesn't match in height -->
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
	</div>

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
LISTAR OS DADOS DO PROTOCOLO
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
AQUI LISTA-SE OS LAUDOS
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
	
    if($$readyToPrint == 0)
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
