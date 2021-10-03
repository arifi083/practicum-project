@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Blog Post </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form method="POST" action="{{ route('post.update',$blogpost->id) }}" enctype="multipart/form-data">   <!-- this is our // form -->
         
      @csrf


      <input type="hidden" name="old_image" value="{{ $blogpost->post_image }}">


    <div class="row">  <!-- start first row -->
       
       <div class="col-md-6"> 

           <div class="form-group">
              <h5>Post Title English<span class="text-danger">*</span></h5>
              <div class="controls">
                 <input type="text" name="post_title_en" class="form-control" value="{{ $blogpost->post_title_en }}" required="">

                    @error('post_title_en') 
	                 <span class="text-danger">{{ $message }}</span>
	               @enderror      
                </div>
            </div>

       </div> <!-- end col-md-4 -->

       <div class="col-md-6"> 
           <div class="form-group">
                <h5>Post Title Bangla<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="post_title_bn" value="{{ $blogpost->post_title_bn }}" class="form-control" required="">

                     @error('post_title_bn') 
	                   <span class="text-danger">{{ $message }}</span>
	                 @enderror 
                </div>

             </div>
 
        </div> <!-- end col-md-4 -->

    </div> <!-- end first row -->


     
    <div class="row">  <!-- start secnod row -->

       <div class="col-md-6"> 
          <div class="form-group">
			 <h5>Blog Category Select <span class="text-danger">*</span></h5>
			  <div class="controls">
			     <select name="category_id" id=""  class="form-control" required="">

				    <option value="" selected="" disabled="">Select BlogCategory</option>

                    @foreach($blogcategory as $category)
	<option value="{{ $category->id }}" {{ $category->id == $blogpost->category_id ? 'selected':''}}> {{ $category->blog_category_name_en }} </option>
				    @endforeach

			     </select>

                  @error('category_id') 
	                <span class="text-danger">{{ $message }}</span>
	              @enderror 

		       </div>
		    </div>

       </div> <!-- end col-md-4 -->


       <div class="col-md-6"> 
           <div class="form-group">
               <h5>Post Main Image<span class="text-danger">*</span></h5>
               <div class="controls">
                  <input type="file" name="post_image" class="form-control"> 
                    
                   @error('post_image') 
	                  <span class="text-danger">{{ $message }}</span>
	                @enderror 
                  <img src="" id="mainThmb">

                </div>
           </div>
       
       </div> <!-- end col-md-4 -->
            

      
      

    </div> <!-- end second row -->

     
<div class="row">  <!-- start third row -->
   <div class="col-md-6"> <!-- col-md-4 -->
       <div class="form-group">
          <h5>Post Details English <span class="text-danger">*</span></h5>
           <div class="controls">
              <textarea id="editor1" name="post_details_en" rows="10" cols="80"  required="">
              {!! $blogpost->post_details_en !!}
		      </textarea>
           </div>
        </div>
    </div> <!-- end col-md-4 -->  

    <div class="col-md-6"> 
        <div class="form-group">
         <h5>Post Details Bangla<span class="text-danger">*</span></h5>
           <div class="controls">
               <textarea id="editor2" name="post_details_bn" rows="10" cols="80"  required="">
               {!! $blogpost->post_details_bn !!}
		       </textarea>
              
           </div>
       
         </div>

    </div> <!-- end col-md-4 -->



</div> <!-- end third row -->
 
       <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Post">
		</div>

        </form>


   

			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>








@endsection