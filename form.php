<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Практика</title>
</head>

<body>
    <div class="popup__body">
        <?php
            if (!empty($messages)) {
                print('<div id="messages">');
                foreach ($messages as $message) {
                    print($message);
                }
                print('</div>');
            }
        ?>
        <div class="popup__content">
            <div class="popup__form">
                <form action="index.php" method="POST" class="login">
                    <div class="popup__title">Сontact Us</div>
                    <input type="text" required placeholder="Username" id="username" name="name"
                        <?php if ($errors['name'] || $errors['limit_name']) {print 'class="error"';} ?>
                        value="<?php print $values['name']; ?>">
                    <input type="email" required placeholder="Email" id="email" name="email"
                        <?php if ($errors['email'] || $errors['limit_mail']) {print 'class="error"' ;} ?>
                        value="<?php print $values['email']; ?>">
                    <input type="date" required id="data" name="dateB"
                        <?php if ($errors['dataB']) {print 'class="error"';} ?>
                        value="<?php print $values['dataB']; ?>">
                    <div <?php if ($errors['gender']) {print 'class="error"' ;}?>>
                        <input type="radio" name="gender" id="male" value="male"
                            <?php if($values['gender']=="male") {print 'checked';} ?>>
                        <label class="radio" for="male">
                            <span class="gender">Male</span>
                        </label>
                        <input type="radio" name="gender" id="female" value="female"
                            <?php if($values['gender']=="female") {print 'checked';} ?>>
                        <label class="radio" for="female">
                            <span class="gender">Female</span>
                        </label>
                    </div>

                    <select name="superpowers[]" multiple="multiple" size="3" required
                        <?php if ($errors['superpowers']) {print 'class="error"';} ?>>
                        <option value="superpower-1"
                            <?php if($values['superpowers']=="superpower-1"){print 'selected';}?>>
                            Immortality
                        </option>
                        <option value="superpower-2"
                            <?php if($values['superpowers']=="superpower-2"){print 'selected';}?>>
                            Magic
                        </option>
                        <option value="superpower-3"
                            <?php if($values['superpowers']=="superpower-3"){print 'selected';}?>>
                            Levitation
                        </option>
                    </select>

                    <div class="limbs" <?php if ($errors['limbs']) {print 'class="error"';} ?>>
                        <input type="radio" name="limbs" id="1" value="1"
                            <?php if($values['limbs']=="1") {print 'checked';} ?>>
                        <label class="radio" for="1">One limb</label>
                        <input type="radio" name="limbs" id="2" value="2"
                            <?php if($values['limbs']=="2") {print 'checked';} ?>>
                        <label class="radio" for="2">Two limbs</label>
                        <input type="radio" name="limbs" id="3" value="3"
                            <?php if($values['limbs']=="3") {print 'checked';} ?>>
                        <label class="radio" for="3">Three limbs</label>
                        <input type="radio" name="limbs" id="4" value="4"
                            <?php if($values['limbs']=="4") {print 'checked';} ?>">
                        <label class="radio" for="4">Four limbs</label>
                    </div>

                    <textarea name="biography" required placeholder="Biography" <?php print $values['biography']; ?>>
                    </textarea>
                    <div class="checkbox">
                        <input id="formAgreement" required type="checkbox" class="checkbox__input" name="checkbox">
                        <label for="formAgreement" class="checkbox__label">I Agree to <a href="https://www.kubsu.ru/">
                                Privacy
                                Policy</a></label>
                    </div>
                    <button class="button__form">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>