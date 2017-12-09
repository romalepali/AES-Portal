function update_id(id)
{
    if(confirm('Are you sure you want to change the data?'))
    {
        window.location.href='teachers-update.php?update_id='+id;
    }
}
function view_id(id)
{
     window.location.href='students-profile.php?view_id='+id;
}
function upload_prof(id)
{
    window.location.href='upload-teachers.php?upload_prof='+id;
}