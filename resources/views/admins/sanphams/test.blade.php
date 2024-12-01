@extends('layouts.admin')


@section('css')

   <!-- Quill css -->
   <link href="{{ asset('assets/admin/libs/quill/quill.core.js')}}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">
<div class="mb-3">
  <label for="hinh_anh" class="form-label">Album hình ảnh</label>
  <i id="add-row"
  class="mdi mdi-plus text-muted fs-18 rounded-2 border ms-3 p-1" style="cursor: pointer"></i>
  <table class="table align-middle table-nowrap mb-0">
      <tbody id="image-table-body">
          <tr>
              <td class="d-flex align-item-center">
                  <img id="preview_0" src="https://static.vecteezy.com/system/resources/previews/000/420/681/original/picture-icon-vector-illustration.jpg" alt="Hình Ảnh SẢn Phẩm"
                  style="width: 50px" class="me-3">
                  <input type="file" id="hinh_anh" name="list_hinh_anh[id_0]" class="form-control"
                  onchange="previewImage(this,0)">
             


              </td>
              <td>
                  <i 
                      class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" ></i>
              </td>
          </tr>
      </tbody>

  </table>
 
</div>
</div>
@endsection
@section('js')
 <!-- Quill Editor Js -->
 <script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
 <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>
 {{-- Của phần nội dung --}}
 <script>

document.addEventListener('DOMContentLoaded', function(){
    var quill = new Quill("#quill-editor", {
        theme: "snow",
})
//Hiển thị nội dung cũ
           var old_content = `{!! old('noi_dung') !!}`;
           quill.root.innerHTML = old_content
   //Cập nhật lại textarea ẩn khi nội dung của quill-editer thay đổi 
   quill.on('text-change', function(){
    var html = quill.root.innerHTML;
    document.getElementById('noi_dung_content').value = html
   })
})

            </script>

<script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';


            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    {{-- Thêm album ảnh --}}
<script>
document.addEventListener('DOMContentLoaded', function(){
    
    var rowCount = 1;
    
   document.getElementById('add-row').addEventListener('click', function(){
    var tableBody = document.getElementById('image-table-body');
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
     <td class="d-flex align-item-center">
    <img id="preview_${rowCount}" src="https://static.vecteezy.com/system/resources/previews/000/420/681/original/picture-icon-vector-illustration.jpg" alt="Hình Ảnh SẢn Phẩm"
    style="width: 50px" class="me-3">
    <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control"
    onchange="previewImage(this,${rowCount})">



</td>
<td>
    <i 
        class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
</td>`;
tableBody.appendChild(newRow);
rowCount++;
    
   })


   
});
 function previewImage(input, rowIndex){

if(input.files && input.files[0]){
    const reader = new FileReader();

reader.onload = function(e) {
   document.getElementById(`preview_${rowIndex}`).setAttribute('src',e.target.result)


}

    reader.readAsDataURL(input.files[0]);

}

}
function removeRow (item){
    var row = item.closest('tr');
    row.remove();
}
</script>
@endsection
