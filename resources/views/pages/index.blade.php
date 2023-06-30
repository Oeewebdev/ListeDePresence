@extends('layouts.app')

@section('titre')
    ListePresence
@endsection

@section('contenu')
    <br><br><br><br><br>

    <div class="container">
        <h2 class="text-center text-info">
            Liste De Presence
        </h2><br>
        <div class="container bg-info" style="border-radius: 25px;">
            <br>
            <form method="POST" action="{{ route('formulaire') }}">
                @csrf

                <div class="row">
                    <div class="col">
                        <label for="first_name" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Saisir Nom"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Saisir Prenom"
                            aria-label="Last name">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="mail" class="form-label">Mail</label>
                        <input type="email" name="email" class="form-control" placeholder="saisir mail"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="tel" class="form-label">Telephone</label>
                        <input type="tel" name="telephone" class="form-control" placeholder="saisir Telephone"
                            aria-label="Last name">

                    </div>


                </div><br>
                <div class="row text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-light">Valider</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div><br><br>

    <!--tableau donnees-->

    @if (session('donnees'))
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            @foreach (session('donnees') as $key => $donnees)
                <tbody>
                    <tr>
                        <td>{{ $donnees['nom'] }}</td>
                        <td>{{ $donnees['prenom'] }}</td>
                        <td>{{ $donnees['email'] }}</td>
                        <td>{{ $donnees['telephone'] }}</td>
                        <td>
                            <form action="{{ route('supprimer') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nom" value="{{ $donnees['nom'] }}">
                                <input type="hidden" name="prenom" value="{{ $donnees['prenom'] }}">
                                <input type="hidden" name="email" value="{{ $donnees['email'] }}">
                                <input type="hidden" name="telephone" value="{{ $donnees['telephone'] }}">
                                <button type="submit">supprimer</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    @endif
@endsection
