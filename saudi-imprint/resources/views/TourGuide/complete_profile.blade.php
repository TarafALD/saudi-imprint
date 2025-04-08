<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Tour Guide Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            max-width: 600px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-container .form-control {
            border-radius: 8px;
        }
        .profile-container .btn {
            border-radius: 8px;
            font-weight: bold;
        }
        .profile-container .btn-primary {
            background-color: #71c55d;
            border: none;
        }
        .profile-container .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .profile-container .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .checkbox-columns {
            column-count: 2;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <h3 class="profile-header">Complete Your Tour Guide Profile</h3>
        
        <div class="alert alert-info mb-4">
            Your license has been approved! Please complete your profile information to start using our platform.
        </div>

        <form method="POST" action="{{ route('TourGuide.save_profile') }}">
            @csrf
            
            <div class="mb-3">
                <label for="bio" class="form-label">Bio / About Me</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                    <textarea id="bio" name="bio" class="form-control @error('bio') is-invalid @enderror" 
                        rows="4" required>{{ old('bio') }}</textarea>
                </div>
                <small class="text-muted">Tell us about yourself and your background (max 500 characters)</small>
                @error('bio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tools"></i></span>
                    <input type="text" id="skills" name="skills" class="form-control @error('skills') is-invalid @enderror"
                        value="{{ old('skills') }}" required>
                </div>
                <small class="text-muted">List your skills, separated by commas (e.g., Navigation, First Aid, Photography)</small>
                @error('skills')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="years_experience" class="form-label">Years of Experience</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                    <input type="number" id="years_experience" name="years_experience" 
                        class="form-control @error('years_experience') is-invalid @enderror" 
                        min="0" value="{{ old('years_experience') }}" required>
                </div>
                @error('years_experience')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Languages Spoken</label>
                <div class="p-3 bg-light rounded">
                    <div class="checkbox-columns">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Arabic" id="language_arabic" 
                                {{ in_array('Arabic', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_arabic">Arabic</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="English" id="language_english" 
                                {{ in_array('English', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_english">English</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Spanish" id="language_spanish"
                                {{ in_array('Spanish', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_spanish">Spanish</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="French" id="language_french"
                                {{ in_array('French', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_french">French</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="German" id="language_german"
                                {{ in_array('German', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_german">German</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Italian" id="language_italian"
                                {{ in_array('Italian', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_italian">Italian</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Chinese" id="language_chinese"
                                {{ in_array('Chinese', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_chinese">Chinese</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Japanese" id="language_japanese"
                                {{ in_array('Japanese', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_japanese">Japanese</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Russian" id="language_russian"
                                {{ in_array('Russian', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_russian">Russian</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Turkish" id="language_turkish"
                                {{ in_array('Turkish', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_turkish">Turkish</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Urdu" id="language_urdu"
                                {{ in_array('Urdu', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_urdu">Urdu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" 
                                value="Hindi" id="language_hindi"
                                {{ in_array('Hindi', old('languages', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="language_hindi">Hindi</label>
                        </div>
                    </div>
                </div>
                @error('languages')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Regions of Operation (ROO)</label>
                <div class="p-3 bg-light rounded">
                    <div class="checkbox-columns">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Riyadh" id="region_riyadh" 
                                {{ in_array('Riyadh', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_riyadh">Riyadh</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Makkah" id="region_makkah" 
                                {{ in_array('Makkah', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_makkah">Makkah</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Madinah" id="region_madinah" 
                                {{ in_array('Madinah', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_madinah">Madinah</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Eastern Province" id="region_eastern" 
                                {{ in_array('Eastern Province', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_eastern">Eastern Province</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Asir" id="region_asir" 
                                {{ in_array('Asir', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_asir">Asir</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Tabuk" id="region_tabuk" 
                                {{ in_array('Tabuk', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_tabuk">Tabuk</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Hail" id="region_hail" 
                                {{ in_array('Hail', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_hail">Hail</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Northern Borders" id="region_northern" 
                                {{ in_array('Northern Borders', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_northern">Northern Borders</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Jazan" id="region_jazan" 
                                {{ in_array('Jazan', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_jazan">Jazan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Najran" id="region_najran" 
                                {{ in_array('Najran', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_najran">Najran</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Al-Baha" id="region_albaha" 
                                {{ in_array('Al-Baha', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_albaha">Al-Baha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Al-Jouf" id="region_aljouf" 
                                {{ in_array('Al-Jouf', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_aljouf">Al-Jouf</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ROO[]" 
                                value="Al-Qassim" id="region_alqassim" 
                                {{ in_array('Al-Qassim', old('ROO', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="region_alqassim">Al-Qassim</label>
                        </div>
                    </div>
                </div>
                @error('ROO')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Preferences</label>
                <div class="p-3 bg-light rounded">
                    <div class="checkbox-columns">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Historical Sites" id="pref_historical" 
                                {{ in_array('Historical Sites', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_historical">Historical Sites</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Cultural Experiences" id="pref_cultural" 
                                {{ in_array('Cultural Experiences', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_cultural">Cultural Experiences</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Outdoor Adventures" id="pref_outdoor" 
                                {{ in_array('Outdoor Adventures', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_outdoor">Outdoor Adventures</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Desert Excursions" id="pref_desert" 
                                {{ in_array('Desert Excursions', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_desert">Desert Excursions</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Culinary Tours" id="pref_culinary" 
                                {{ in_array('Culinary Tours', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_culinary">Culinary Tours</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Shopping Tours" id="pref_shopping" 
                                {{ in_array('Shopping Tours', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_shopping">Shopping Tours</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Religious Sites" id="pref_religious" 
                                {{ in_array('Religious Sites', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_religious">Religious Sites</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Photography Tours" id="pref_photography" 
                                {{ in_array('Photography Tours', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_photography">Photography Tours</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Family Friendly" id="pref_family" 
                                {{ in_array('Family Friendly', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_family">Family Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prefrences[]" 
                                value="Luxury Experiences" id="pref_luxury" 
                                {{ in_array('Luxury Experiences', old('prefrences', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pref_luxury">Luxury Experiences</label>
                        </div>
                    </div>
                </div>
                @error('prefrences')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary me-md-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Complete Profile</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>