@extends('admin.layout')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавить статью
            <small>приятные слова..</small>
          </h1>
        </section>
    
        <!-- Main content -->
        <section class="content">
         {!! Form::open(['route' => 'posts.store', 'files'=> true]) !!}
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Добавляем статью</h3>
              @include('messages')
            </div>
            <div class="box-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Название</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Лицевая картинка</label>
                  <input type="file" id="exampleInputFile" name="image">
    
                  <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                </div>
                <div class="form-group">
                    
          {{Form::select('category_id',
           $categories,
            null,
             ['class' => 'form-control custom-select'])}}
                     
                  </div>
                <div class="form-group">
                  
                  {{Form::select('tags[]',
                  $tags,
                   null,
                    ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Теги'])}}
                 
                </div>
                <!-- Date -->
                <div class="form-group">
                  <label>Дата:</label>
    
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                  </div>
                  <!-- /.input group -->
                </div>
    
                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" name="is_featured" class="minimal">
                  </label>
                  <label>
                    Рекомендовать
                  </label>
                </div>
    
                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" name="status" class="minimal">
                  </label>
                  <label>
                    Черновик
                  </label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Полный текст</label>
                  <textarea  id="" cols="30" rows="10" class="form-control" name="content"></textarea>
              </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Описание</label>
                  <textarea  id="" cols="30" rows="10" class="form-control" name="description"></textarea>
              </div>
            </div>
          </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
              <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->
          {!! Form::close() !!}
        </section>
        <!-- /.content -->
      </div>
@endsection