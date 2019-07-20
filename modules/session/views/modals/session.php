
<div class="modal fade" id="add_session" tabindex="-1" role="dialog" aria-labelledby="add_session" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add New Session</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_transout" method="get" action="<?php echo base_url() . 'session/service_sessions/add/'.$rel_id.'/'.$service_id . '/' . get_staff_user_id() ?>">
                   <div class="form-group">
                        
                          <div class="form-group">
                            <label for="subject" class="col-form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                          </div>
                          
                          <div class="form-group">
                            <label for="staff_id" class="col-form-label">Court</label>
                            <div class="row-fluid">
                              <select name="court_id" id="court_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                                <?php foreach ($courts as $court){ ?>

                                  <option value="<?php echo $court['c_id'] ?>"><?php echo $court['court_name'] ?></option>
                                  
                                <?php } ?>
                              </select>
                            
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="staff_id" class="col-form-label">Judge</label>
                            <div class="row-fluid">
                              <select name="judge_id" id="judge_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                                <?php foreach ($judges as $judge){ ?>

                                  <option value="<?php echo $judge['id'] ?>"><?php echo $judge['name'] ?></option>
                                  
                                <?php } ?>
                              </select>
                            
                            </div>
                          </div>

                          <div class="form-group" app-field-wrapper="date">
                            <label for="date" class="control-label">Date</label>
                            <div class="input-group date">
                              <input type="text" id="date" name="date" class="form-control datepicker" value="<?php echo '20' . date('y') . '-' . date('m') . '-' . date('d'); ?>" autocomplete="off" aria-invalid="false">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar calendar-icon"></i>
                              </div>
                            </div>
                          </div>
                    </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_session" tabindex="-1" role="dialog" aria-labelledby="update_session" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Update Session</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_transout" method="get" action="<?php echo base_url() . 'session/service_sessions/update/'.$rel_id.'/'.$service_id ?>">
                   <div class="form-group">
                        
                          <input aria-hidden="true" type="hidden" class="form-control" id="id" name="id">

                          <div class="form-group">
                            <label for="subject" class="col-form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                          </div>

                          <div class="form-group">
                            <label for="staff_id" class="col-form-label">Court</label>
                            <div class="row-fluid">
                              <select id="selection" name="court_id" id="court_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                                <?php foreach ($courts as $court){ ?>

                                  <option class="<?php echo $court['c_id'] ?>" value="<?php echo $court['c_id'] ?>"><?php echo $court['court_name'] ?></option>
                                  
                                <?php } ?>
                              </select>
                            
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="staff_id" class="col-form-label">Judge</label>
                            <div class="row-fluid">
                              <select name="judge_id" id="judge_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                                <?php foreach ($judges as $judge){ ?>

                                  <option value="<?php echo $judge['id'] ?>"><?php echo $judge['name'] ?></option>
                                  
                                <?php } ?>
                              </select>
                            
                            </div>
                          </div>

                          <div class="form-group" app-field-wrapper="date">
                            <label for="date" class="control-label">Date</label>
                            <div class="input-group date">
                              <input type="text" id="date" name="date" class="form-control datepicker" value="2019-05-23" autocomplete="off" aria-invalid="false">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar calendar-icon"></i>
                              </div>
                            </div>
                          </div>
                    </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
        </form>
      </div>
    </div>
  </div>
</div>