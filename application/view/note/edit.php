<h4>Edit Note</h4>

        <h4>Edit a note</h4>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->note) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>note/editSave">
                <label>Change text of note: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="note_id" value="<?php echo htmlentities($this->note->note_id); ?>" />
                <input type="text" name="note_text" value="<?php echo htmlentities($this->note->note_text); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This note does not exist.</p>
        <?php } ?>