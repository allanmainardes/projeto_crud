<?php include __DIR__ . "/../header.php" ?>
    <form action= "/save-employee<?= isset($employee) ? '?id=' . $employee['id_func'] : ''; ?>" method="post">
        <label for="nomeFunc"> Nome </label>
        <input type="text" name="nomeFunc" id="nomeFunc" value="<?= isset($employee) ? $employee['nome_func'] : ''; ?> ">

        <label for="cpfFunc"> CPF </label>
        <input type="text" name="cpfFunc" id="cpfFunc" value="<?= isset($employee) ? $employee['cpf_func'] : ''; ?>">

        <label for="emailFunc"> Email </label>
        <input type="email" name="emailFunc" id="emailFunc" value="<?= isset($employee) ? $employee['email_func'] : ''; ?>">

        <label for="estadoCivilFunc"> Estado Civil </label>
        <select name="estadoCivilFunc" id="estadoCivilFunc">
            <option value="solteiro">Solteiro(a)</option>
            <option value="casado">Casado(a)</option>
            <option value="divorciado">Divorciado(a)</option>
            <option value="viuvo">Viúvo(a)</option>
        </select>
        

        <label for="dtNascimentoFunc"> Data Nascimento </label>
        <input type="date" name="dtNascimentoFunc" id="dtNascimentoFunc" value="<?= isset($employee) ? $employee['dt_nascimento_func'] : ''; ?>">
        

        <input type="submit" value="submit">

    </form>
<?php include __DIR__ . "/../footer.php" ?>