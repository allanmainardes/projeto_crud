<?php include __DIR__ . "/../header.php" ?>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><?=$titulo;?></h2>
					</div>
					<div class="col-sm-6">
						<a href="#editEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CPF</th>
						<th>Email</th>
						<th>Estado Civil</th>
						<th>Data Nascimento</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach($employees as $employee): ?>
					<tr>
						<td id="tdNome"><?= $employee['nome_func'] ?></td>
                        <td id="tdCpf"><?= $employee['cpf_func'] ?></td>
                        <td id="tdEmail"><?= $employee['email_func'] ?></td>
                        <td id="tdEstadoCivil"><?= $employee['estado_civil_func'] ?></td>
                        <td id="tdDtNascimento"><?= $employee['dt_nascimento_func'] ?></td>
						<td value = "<?=$employee['id_func'];?>">
							<a href="#editEmployeeModal"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" onclick="fillModalupdateEmployee('<?=$employee['id_func'];?>', '<?=$employee['nome_func'];?>', '<?=$employee['cpf_func'];?>', '<?=$employee['email_func'];?>', '<?=$employee['dt_nascimento_func'];?>')">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" >&#xE872;</i></a>
						</td>
					</tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text" id="count-results" data-results="<?=$resultados?>"></div>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/save-employee" method="POST" id="addEmployee">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Funcionário</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nomeFunc" id="nomeFunc" class="form-control" required>
					</div>
					<div class="form-group">
						<label>CPF</label>
						<input type="text" name="cpfFunc" id="cpfFunc" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="emailFunc" id="emailFunc" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Estado Civil</label>
                        <select name="estadoCivilFunc" id="estadoCivilFunc" class="custom-select">
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                        </select>
					</div>					
                    <div class="form-group">
						<label>Data Nascimento</label>
						<input type="date" name="dtNascimentoFunc" id="dtNascimentoFunc" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="editEmployee" action="/save-employee" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<input type="hidden" id="idFuncModal" name="idFunc">
				<div class="modal-body">					
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nomeFunc" id="nomeFuncModal" class="form-control" required>
						<span class='msg-erro msg-nome'></span>
					</div>
					<div class="form-group">
						<label>CPF</label>
						<input type="text" name="cpfFunc" id="cpfFuncModal" class="form-control" required>
						<span class='msg-erro msg-cpf'></span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="emailFunc" id="emailFuncModal" class="form-control" required></textarea>
						<span class='msg-erro msg-email'></span>
					</div>
					<div class="form-group">
						<label>Estado Civil</label>
                        <select name="estadoCivilFunc" id="estadoCivilFunc" class="custom-select">
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                        </select>
					</div>					
                    <div class="form-group">
						<label>Data Nascimento</label>
						<input type="date" name="dtNascimentoFunc" id="dtNascimentoFuncModal" class="form-control" required>
						<span class='msg-erro msg-data'></span>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" onclick="clearFields()">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Remover Funcionário</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Tem certeza que deseja remover este funcionário?</p>
					<p class="text-warning"><small>Essta ação não pode ser desfeita!</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete" onclick="deleteEmployee(<?=$employee['id_func']?>)">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
<?php include __DIR__ . "/../footer.php" ?>
