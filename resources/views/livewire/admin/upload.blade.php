<div class="container mx-auto py-12">
    <form method="POST" action="{{ route('excel.upload') }}" name="excelUpload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel" id="excel">
        <button type="submit">Upload</button>
    </form>
</div>
