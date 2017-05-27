<main id='rate'>
  <div id='map'></div>
  <div class='container'>
    <div class='row'>
      <h1 id='title'>Add Rating for </h1>
      <?php echo form_open('main/addRating'); ?>
        <div class='input-field'>
          <label for='rating'>Rating</label>
          <select name='rating'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
          </select>
        </div>
        <div class='input-field'>
          <label for='comment'>Comment</label>
          <textarea name='comment'></textarea>
        </div>
        <input type='hidden' name='place_id' value='<?php echo $place_id; ?>' />
        <input type='submit' name='submit' value='submit' />
      </form>
    </div>
  </div>
</main>
