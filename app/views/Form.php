<section class="container">
    <div class="form-header">
        <h2>PHP Form Validation</h2>
        <p><span class="error">* required field</span></p>
        <?php if ($errors) : ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $v) : ?>
                        <li> <?php echo $v; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-label">
            Name:
        </div>
        <div class="form-input">
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-label">
            E-mail
        </div>
        <div class="form-input">
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="rror"></span>
        </div>
        <div class="form-label">
            Website:
        </div>
        <div class="form-input">
            <input type="text" name="website" value="<?php echo $website; ?>">
        </div>
        <div class="form-label">
            Comment:
        </div>
        <div class="form-input">
            <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        </div>
        <div class="form-label">Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male"> Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"> Other
        </div>
        <div class="form-label">
            <input type="checkbox" name="fruits" id="apple" <?php if (isset($fruits) && $fruits == 'apple') echo "checked"; ?> value="fruits[]"> Apple
            <input type="checkbox" name="fruits" id="orange" <?php if (isset($fruits) && $fruits == 'orange') echo "checked"; ?> value="fruits[]"> Orange
            <input type="checkbox" name="fruits" id="mango" <?php if (isset($fruits) && $fruits == 'mango') echo "checked"; ?> value="fruits[]"> Mango
        </div>
        <button class="form-input" type="submit" name="submit">Submit</button>
    </form>
</section>