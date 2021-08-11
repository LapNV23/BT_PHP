<?php
    ?>
{{--Thừa kế từ app.blade template--}}
@extends('layout.app')
{{--Nội dung trang con--}}
@section('content')
{{--    Định nghĩa phần nội dung--}}
    <div class="panel-body">
{{--        Hiển thị thông báo lỗi--}}
        @include('errors.503')
{{--        form nhập task mới--}}
        <form action="{{url('tasks')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

{{--            Nút Task--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus">
                            Add Task
                        </i>
                    </button>
                </div>
            </div>
        </form>
    @if(count($task)>0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Task
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <td>Task</td>
                    <td></td>
                    </thead>
                </table>
            </div>
        </div>
    </div>
