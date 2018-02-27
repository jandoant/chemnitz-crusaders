@extends('layouts.app') @section('content')

<div class="row">
    <div class="col">
        <h1>Create a User</h1>
    </div>
</div>
<div class="row">

    <form class="col-sm-6" action="/users" method="POST">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">Vornamen</label>
                    <input name="firstname" required type="text" class="form-control" placeholder="Bitte Vorname eingeben...">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Nachnamen</label>
                    <input name="lastname" required type="text" class="form-control" placeholder="Bitte Nachname eingeben...">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input name="email" required type="email" class="form-control" placeholder="Bitte E-Mail-Adresse eingeben...">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Passwort (Standard: 'secret')</label>
                    <input name="password" required type="password" class="form-control" value="secret">
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Geburtsdatum</label>
                    <div class="input-group">
                        <input type="date" name="birthdate" class="form-control"/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            


        </div>

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">Rolle</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Spieler
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Coach
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-row">
            <button class="btn btn-primary" type="submit">Erstellen</button>
        </div>
    </form>
</div>


@endsection