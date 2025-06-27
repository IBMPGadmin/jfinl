@extends('layouts.user-layout')

@section('content')
<div class="container">
    <div class="row gap_top">
        <div class="col-12 mb-4">            <div class="bg_custom p-4 rounded shadow-sm">
                <h4 data-en="Client Details" data-fr="Détails du client">Client Details</h4>
                <div><strong data-en="Name:" data-fr="Nom :">Name:</strong> {{ $client->client_name ?? '-' }}</div>
                <div><strong data-en="Email:" data-fr="Courriel :">Email:</strong> {{ $client->client_email ?? '-' }}</div>
                <!-- Add more client details as needed -->
            </div>
        </div>
        <form method="GET" action="" id="filterForm" class="gap_top btn-shadow bg_custom p-4 rounded shadow-sm">
            <div class="row g-3 align-items-center">
                <div class="col-lg-12">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" class="form-control" 
                               placeholder="Search by Legal Act, Regulation, or Keyword.." 
                               data-placeholder-en="Search by Legal Act, Regulation, or Keyword.."
                               data-placeholder-fr="Rechercher par Loi juridique, Règlement ou Mot-clé.."
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <select name="law_id" class="form-select">
                        <option value="" data-en="Select Law Subject" data-fr="Sélectionner le sujet de droit">Select Law Subject</option>
                        <option value="1" {{ request('law_id') == '1' ? 'selected' : '' }} data-en="Immigration" data-fr="Immigration">Immigration</option>
                        <option value="2" {{ request('law_id') == '2' ? 'selected' : '' }} data-en="Citizenship" data-fr="Citoyenneté">Citizenship</option>
                        <option value="3" {{ request('law_id') == '3' ? 'selected' : '' }} data-en="Criminal" data-fr="Criminel">Criminal</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <select name="jurisdiction_id" class="form-select">
                        <option value="" data-en="Select Jurisdiction" data-fr="Sélectionner la juridiction">Select Jurisdiction</option>
                        <option value="1" {{ request('jurisdiction_id') == '1' ? 'selected' : '' }} data-en="Federal" data-fr="Fédéral">Federal</option>
                        <optgroup label="Provincial" data-label-en="Provincial" data-label-fr="Provincial">
                            <option value="2" {{ request('jurisdiction_id') == '2' ? 'selected' : '' }}>Alberta</option>
                            <option value="3" {{ request('jurisdiction_id') == '3' ? 'selected' : '' }} data-en="British Columbia" data-fr="Colombie-Britannique">British Columbia</option>
                            <option value="4" {{ request('jurisdiction_id') == '4' ? 'selected' : '' }}>Manitoba</option>
                            <option value="5" {{ request('jurisdiction_id') == '5' ? 'selected' : '' }} data-en="New Brunswick" data-fr="Nouveau-Brunswick">New Brunswick</option>
                            <option value="6" {{ request('jurisdiction_id') == '6' ? 'selected' : '' }} data-en="Newfoundland & Labarador" data-fr="Terre-Neuve-et-Labrador">Newfoundland & Labarador</option>
                            <option value="7" {{ request('jurisdiction_id') == '7' ? 'selected' : '' }} data-en="Nova Scotia" data-fr="Nouvelle-Écosse">Nova Scotia</option>
                            <option value="8" {{ request('jurisdiction_id') == '8' ? 'selected' : '' }}>Ontario</option>
                            <option value="9" {{ request('jurisdiction_id') == '9' ? 'selected' : '' }} data-en="Price Edward Island" data-fr="Île-du-Prince-Édouard">Price Edward Island</option>
                            <option value="10" {{ request('jurisdiction_id') == '10' ? 'selected' : '' }} data-en="Quebec" data-fr="Québec">Quebec</option>
                            <option value="11" {{ request('jurisdiction_id') == '11' ? 'selected' : '' }}>Saskatchewan</option>
                        </optgroup>
                        <optgroup label="Territorial" data-label-en="Territorial" data-label-fr="Territorial">
                            <option value="12" {{ request('jurisdiction_id') == '12' ? 'selected' : '' }} data-en="Nortwest Territories" data-fr="Territoires du Nord-Ouest">Nortwest Territories</option>
                            <option value="13" {{ request('jurisdiction_id') == '13' ? 'selected' : '' }}>Nunavut</option>
                            <option value="14" {{ request('jurisdiction_id') == '14' ? 'selected' : '' }}>Yukon</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-lg-4">
                    <select name="act_id" class="form-select">
                        <option value="" data-en="Select Docs Category" data-fr="Sélectionner la catégorie de documents">Select Docs Category</option>
                        <option value="1" {{ request('act_id') == '1' ? 'selected' : '' }} data-en="Acts" data-fr="Lois">Acts</option>
                        <option value="2" {{ request('act_id') == '2' ? 'selected' : '' }} data-en="Appeal & Review Processes" data-fr="Processus d'appel et de révision">Appeal & Review Processes</option>
                        <option value="3" {{ request('act_id') == '3' ? 'selected' : '' }} data-en="CaseLaw" data-fr="Jurisprudence">CaseLaw</option>
                        <option value="4" {{ request('act_id') == '4' ? 'selected' : '' }} data-en="Codes" data-fr="Codes">Codes</option>
                        <option value="5" {{ request('act_id') == '5' ? 'selected' : '' }} data-en="Enforcement" data-fr="Application">Enforcement</option>
                        <option value="6" {{ request('act_id') == '6' ? 'selected' : '' }} data-en="Forms" data-fr="Formulaires">Forms</option>
                        <option value="7" {{ request('act_id') == '7' ? 'selected' : '' }} data-en="Guidelines" data-fr="Directives">Guidelines</option>
                        <option value="8" {{ request('act_id') == '8' ? 'selected' : '' }} data-en="Agreements" data-fr="Accords">Agreements</option>
                        <option value="9" {{ request('act_id') == '9' ? 'selected' : '' }} data-en="Ministerial Instructions" data-fr="Instructions ministérielles">Ministerial Instructions</option>
                        <option value="10" {{ request('act_id') == '10' ? 'selected' : '' }} data-en="Operational Bulletins" data-fr="Bulletins opérationnels">Operational Bulletins</option>
                        <option value="11" {{ request('act_id') == '11' ? 'selected' : '' }} data-en="Policies" data-fr="Politiques">Policies</option>
                        <option value="12" {{ request('act_id') == '12' ? 'selected' : '' }} data-en="Procedures" data-fr="Procédures">Procedures</option>
                        <option value="13" {{ request('act_id') == '13' ? 'selected' : '' }} data-en="Regulations" data-fr="Règlements">Regulations</option>
                    </select>
                </div>
                <div class="col-lg-12 d-flex submit_reset_format justify-content-end">
                    <div class="button-group">
                        <button type="submit" class="btn btn-custom me-2">
                            <i class="fas fa-search"></i> <span data-en="Search" data-fr="Rechercher">Search</span>
                        </button>
                        <a href="{{ route('user.client.legal-tables', $client->id) }}" class="btn btn-reset">
                            <i class="fas fa-undo"></i> <span data-en="Reset" data-fr="Réinitialiser">Reset</span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>    <div class="row">
        @if(isset($message))
            <div class="col-12 mt-4">
                <div class="alert alert-info">{{ $message }}</div>
            </div>
        @endif
        <div class="gap_top view-mode-selector col-lg-12 d-flex justify-content-end">
            <button class="btn btn-shadow btn-custom2 btn-outline-primary view-mode-btn me-2 active-view" data-view-mode="grid">
                <i class="fas fa-th-large"></i> <span data-en="Grid View" data-fr="Vue en grille">Grid View</span>
            </button>
            <button class="btn btn-custom2 btn-outline-primary view-mode-btn" data-view-mode="list">
                <i class="fas fa-list"></i> <span data-en="List View" data-fr="Vue en liste">List View</span>
            </button>
        </div>
        <div class="row gap_top custom-container act-content">
            <div class="act-content grid-view">
                @if($results->count())
                    @foreach($results as $row)                        <div class="col-lg-4 col-md-6 act-card btn-shadow" onclick="window.location='{{ url('view-legal-table/' . $row->table_name . '?category_id=' . $row->id . '&client_id=' . $client->id) }}'">
                            <div class="act-card-inner">
                                <i class="fas fa-book act-icon"></i>                                <div class="act-home-title">{{ $row->act_name }}</div>
                                <div class="act-category"><span data-en="Category:" data-fr="Catégorie :">Category:</span> {{ $row->act_id }}</div>
                                <div class="act-law"><span data-en="Law Subject:" data-fr="Sujet de droit :">Law Subject:</span> {{ $row->law_id }}</div>
                                <div class="act-jurisdiction"><span data-en="Jurisdiction:" data-fr="Juridiction :">Jurisdiction:</span> {{ $row->jurisdiction_id }}</div>
                                <div class="act-description"><span data-en="Created:" data-fr="Créé :">Created:</span> {{ $row->created_at }}</div>
                                <div class="view-button"><span data-en="View Document" data-fr="Voir le document">View Document</span> <i class="fas fa-arrow-right"></i></div>
                                
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 1rem; color: #999;"></i>
                        <p data-en="No legal acts found matching your search criteria." data-fr="Aucune loi juridique trouvée correspondant à vos critères de recherche.">No legal acts found matching your search criteria.</p>
                    </div>
                @endif
            </div>
            <div class="act-content list-view" style="display: none;">
                @if($results->count())
                    @foreach($results as $row)                        <div class="col-lg-12 act-card btn-shadow" onclick="window.location='{{ url('view-legal-table/' . $row->table_name . '?category_id=' . $row->id . '&client_id=' . $client->id) }}'">
                            <div class="act-card-inner">
                                <div class="act-home-title">{{ $row->act_name }}</div>
                                <div class="act-description"><span data-en="Created:" data-fr="Créé :">Created:</span> {{ $row->created_at }}</div>
                                <div class="view-button"><span data-en="View Document" data-fr="Voir le document">View Document</span> <i class="fas fa-arrow-right"></i></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 1rem; color: #999;"></i>
                        <p data-en="No legal acts found matching your search criteria." data-fr="Aucune loi juridique trouvée correspondant à vos critères de recherche.">No legal acts found matching your search criteria.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toggle between grid and list view
    document.querySelectorAll('.view-mode-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-mode-btn').forEach(b => b.classList.remove('active-view'));
            btn.classList.add('active-view');
            if (btn.dataset.viewMode === 'grid') {
                document.querySelector('.grid-view').style.display = '';
                document.querySelector('.list-view').style.display = 'none';
            } else {
                document.querySelector('.grid-view').style.display = 'none';
                document.querySelector('.list-view').style.display = '';
            }
        });
    });

    // Translation functionality for legal tables page
    function translateLegalTablesPage(language) {
        // Translate all elements with data attributes
        const elements = document.querySelectorAll('[data-en][data-fr]');
        elements.forEach(element => {
            const translation = element.getAttribute('data-' + language);
            if (translation) {
                element.textContent = translation;
            }
        });

        // Translate placeholder texts
        const placeholderElements = document.querySelectorAll('[data-placeholder-en][data-placeholder-fr]');
        placeholderElements.forEach(element => {
            const placeholder = element.getAttribute('data-placeholder-' + language);
            if (placeholder) {
                element.placeholder = placeholder;
            }
        });

        // Translate select options
        const options = document.querySelectorAll('option[data-en][data-fr]');
        options.forEach(option => {
            const translation = option.getAttribute('data-' + language);
            if (translation) {
                option.textContent = translation;
            }
        });

        // Translate optgroup labels
        const optgroups = document.querySelectorAll('optgroup[data-label-en][data-label-fr]');
        optgroups.forEach(optgroup => {
            const label = optgroup.getAttribute('data-label-' + language);
            if (label) {
                optgroup.label = label;
            }
        });
    }

    // Listen for language change events from the main layout
    window.addEventListener('languageChanged', function(event) {
        const selectedLanguage = event.detail.language;
        translateLegalTablesPage(selectedLanguage);
    });

    // Apply saved language on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
        translateLegalTablesPage(savedLanguage);
    });
</script>
@endpush
