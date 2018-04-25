@extends('Futrue.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span12">

                <div class="well login-register">

                    <h5>注册</h5>
                    <hr />

                    <div class="form">
                        <!-- Register form (not working)-->
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                            <!-- Name -->
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <div class="control-group">
                                <label class="control-label" for="name">账号</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="name" placeholder="数字或者字母"
                                     name="name"      value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>


                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                            <!-- Email -->
                            <div class="control-group">
                                <label class="control-label" for="email">绑定邮箱</label>
                                <div class="controls">
                                    <input type="email" class="input-large" id="email"  placeholder="慎重!
密码忘记可以通过邮箱找回密码" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="control-group">
                                <label class="control-label" for="email">密码</label>
                                <div class="controls">
                                    <input type="password" class="input-large" id="password"
                                           name="password" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="email">确认密码</label>
                                <div class="controls">
                                    <input type="password" class="input-large" id="password"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="control-group">
                                <div class="controls">
                                    <label class="checkbox inline">
                                        {{--<input type="checkbox" id="inlineCheckbox1" value="agree"> Agree with Terms and Conditions--}}
                             {{----}}

                                    </label>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="form-actions">
                                <!-- Buttons -->
                                <button type="submit" class="btn">注册</button>
                                <button type="reset" class="btn">重新填写</button>
                            </div>
                        </form>
                        已有未来账号了? <a href="{{route('login')}}" class="btn-link">登录</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

@endsection