<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use App\Models\Logo;
use App\Models\GeneralSetting;
use App\Models\SchoolSetting;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function updateSettings(Request $request)
{
    // Validation may be required here

    $settings = Setting::firstOrNew();

    $settings->system_name = $request->input('system_name');
    $settings->system_title = $request->input('system_title');
    $settings->system_email = $request->input('system_email');
    $settings->phone = $request->input('phone');
    $settings->registration = $request->input('registration');
    $settings->address = $request->input('address');

    $settings->save();

    return redirect()->back()->with('success', 'Settings updated successfully.');
}

    public function uploadLogos(Request $request)
{
    $logos = Logo::firstOrNew();

    if ($request->hasFile('regular_logo')) {
        $regularLogo = $request->file('regular_logo');
        $regularLogoName = Str::uuid() . '.' . $regularLogo->getClientOriginalExtension();
        $regularLogo->storeAs('logos', $regularLogoName, 'public');
        $logos->regular_logo = $regularLogoName;
    }

    if ($request->hasFile('light_logo')) {
        $lightLogo = $request->file('light_logo');
        $lightLogoName = Str::uuid() . '.' . $lightLogo->getClientOriginalExtension();
        $lightLogo->storeAs('logos', $lightLogoName, 'public');
        $logos->light_logo = $lightLogoName;
    }

    if ($request->hasFile('small_logo')) {
        $smallLogo = $request->file('small_logo');
        $smallLogoName = Str::uuid() . '.' . $smallLogo->getClientOriginalExtension();
        $smallLogo->storeAs('logos', $smallLogoName, 'public');
        $logos->small_logo = $smallLogoName;
    }

    if ($request->hasFile('favicon')) {
        $favicon = $request->file('favicon');
        $faviconName = Str::uuid() . '.' . $favicon->getClientOriginalExtension();
        $favicon->storeAs('logos', $faviconName, 'public');
        $logos->favicon = $faviconName;
    }

    $logos->save();

    return redirect()->back()->with('success', 'Logos uploaded successfully.');
}

public function updateGeneralSettings(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'website_title' => 'required|string',
        'homepage_note_title' => 'required|string',
        'principal' => 'required|string',
        'homepage_note_description' => 'required|string',
        'copyright_text' => 'required|string',
        'header_logo' => 'nullable|image',
        'footer_logo' => 'nullable|image',
        'principal_image' => 'nullable|image',
    ]);

    // Find or create the general settings record
    $generalSettings = GeneralSetting::firstOrNew();

    // Handle social links
    $socialLinks = [];
    $socialPlatforms = ['facebook', 'twitter', 'linkedin', 'google', 'youtube', 'instagram'];
    foreach ($socialPlatforms as $platform) {
        if ($request->has($platform . '_link')) {
            $socialLinks[$platform] = $request->input($platform . '_link');
        }
    }

    // Update the general settings attributes
    $generalSettings->website_title = $validatedData['website_title'];
    $generalSettings->social_links = $socialLinks;
    $generalSettings->homepage_note_title = $validatedData['homepage_note_title'];
    $generalSettings->principal = $validatedData['principal'];
    $generalSettings->homepage_note_description = $validatedData['homepage_note_description'];
    $generalSettings->copyright_text = $validatedData['copyright_text'];

    // Update header logo if provided
    if ($request->hasFile('header_logo')) {
        $headerLogo = $request->file('header_logo');
        $headerLogoName = Str::uuid() . '.' . $headerLogo->getClientOriginalExtension();
        $headerLogo->storeAs('logos', $headerLogoName, 'public');
        $generalSettings->header_logo = $headerLogoName;
    }

    // Update footer logo if provided
    if ($request->hasFile('footer_logo')) {
        $footerLogo = $request->file('footer_logo');
        $footerLogoName = Str::uuid() . '.' . $footerLogo->getClientOriginalExtension();
        $footerLogo->storeAs('logos', $footerLogoName, 'public');
        $generalSettings->footer_logo = $footerLogoName;
    }

    if ($request->hasFile('principal_image')) {
        $principalLogo = $request->file('principal_image');
        $principalLogoName = Str::uuid() . '.' . $principalLogo->getClientOriginalExtension();
        $principalLogo->storeAs('logos', $principalLogoName, 'public');
        $generalSettings->principal_image = $principalLogoName;
    }

    // Save the changes
    $generalSettings->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'General settings updated successfully.');
}

public function loginBanner(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'login_banner' => 'nullable|image',
    ]);

    // Find or create the general settings record
    $bannerSettings = GeneralSetting::firstOrNew();


    if ($request->hasFile('login_banner')) {
        $banner = $request->file('login_banner');
        $bannerName = Str::uuid() . '.' . $banner->getClientOriginalExtension();
        $banner->storeAs('logos', $bannerName, 'public');
        $bannerSettings->login_banner = $bannerName;
    }

    // Save the changes
    $bannerSettings->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Banner updated successfully.');
}

public function updateAboutUs(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'about_us' => 'required|string',
        'about_us_image' => 'nullable|image',
    ]);

    // Find or create the general settings record
    $aboutUsSettings = GeneralSetting::firstOrNew();


    if ($request->hasFile('about_us_image')) {
        $aboutUs = $request->file('about_us_image');
        $aboutUsName = Str::uuid() . '.' . $aboutUs->getClientOriginalExtension();
        $aboutUs->storeAs('logos', $aboutUsName, 'public');
        $aboutUsSettings->about_us_image = $aboutUsName;
    }

    $aboutUsSettings->about_us = $validatedData['about_us'];

    // Save the changes
    $aboutUsSettings->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'About Us updated successfully.');
}


public function updatePrivactPolicySettings(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'privacy_policy' => 'required|string',
    ]);

    // Find or create the general settings record
    $privacyPolicy = GeneralSetting::firstOrNew();
    $privacyPolicy->privacy_policy = $validatedData['privacy_policy'];

    // Save the changes
    $privacyPolicy->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Privacy Policy updated successfully.');
}


public function updateTermsAndConditionSettings(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'terms_and_conditions' => 'required|string',
    ]);

    // Find or create the general settings record
    $terms = GeneralSetting::firstOrNew();
    $terms->terms_and_conditions = $validatedData['terms_and_conditions'];

    // Save the changes
    $terms->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Terms updated successfully.');
}


public function updateSliders(Request $request)
{
    // Retrieve slider images from the database
    $currentImagesJson = GeneralSetting::value('slider_images');
    $currentImages = json_decode($currentImagesJson, true);

    // Initialize an array to hold updated slider data
    $sliders = [];

    // Loop through each slider setting and add it to the sliders array
    for ($i = 0; $i < 3; $i++) {
        // Check if the current image exists in the array
        $image = isset($currentImages[$i]['image']) ? $currentImages[$i]['image'] : null;

        // Create an array for the current slider
        $slider = [
            'title' => $request->input("title_$i"),
            'description' => $request->input("description_$i"),
            'image' => $image, // Set to null if not exist
        ];

        // Check if a new image is uploaded
        if ($request->hasFile("slider_image_$i")) {
            $uploadedImage = $request->file("slider_image_$i");
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->storeAs('slider_images', $imageName, 'public');
            $slider['image'] = $imageName;
        }

        // Add the slider to the sliders array
        $sliders[] = $slider;
    }

    // Encode the sliders array to JSON
    $updatedSliderImages = json_encode($sliders);

    // Update the slider images field in general settings
    GeneralSetting::where('id', 1)->update(['slider_images' => $updatedSliderImages]);

    return redirect()->back()->with('success', 'Homepage slider settings updated successfully.');
}


public function schoolSetting(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'school_name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|numeric',
    ]);

    // Find or create the general settings record
    $schoolSettings = SchoolSetting::firstOrNew();

    
    // Update the general settings attributes
    $schoolSettings->school_name = $validatedData['school_name'];
    $schoolSettings->phone = $validatedData['phone'];
    $schoolSettings->address = $validatedData['address'];

    // Save the changes
    $schoolSettings->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'School settings updated successfully.');
}
    
}