<div class="container">



    <div class="row">
        <?php echo form_open('archive/do_archive', ["class" => "col s12"]);?>
            <div class="row">
                <div class="input-field col s6">
                    <input id="start_date" name="start_date"  type="text" class="datepicker">
                    <label for="start_date">Start Date</label>
                </div>
                <div class="input-field col s6">
                    <input id="end_date" name="end_date" type="text" class="datepicker">
                    <label for="end_date">End Date</label>
                </div>
            </div>
            <div class="row"><button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">archive</i>
                </button></div>

        </form>
    </div>

</div>
<script>

</script>