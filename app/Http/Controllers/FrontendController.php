<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\GameCategory;
use App\Models\GameMatch;
use App\Models\Language;
use App\Models\Template;
use App\Models\Subscriber;
use App\Http\Traits\Notify;
use Illuminate\Http\Request;
use App\Models\ContentDetails;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    use Notify;

    public function __construct()
    {
        $this->theme = template();
    }


    // public function countriesJson()
    // {
    //     $data = [

    //         [
    //             "cc"=> "ad",
    //             "name"=> "Andorra",
    //             "image_path" => asset('assets/uploads/countryIcon/ad.svg'),
    //         ],
    //         [
    //             "cc"=> "ae",
    //             "name"=> "United Arab Emirates",
    //             "image_path" => asset('assets/uploads/countryIcon/ae.svg'),
                
    //         ],
    //         [
    //             "cc"=> "af",
    //             "name"=> "Afghanistan",
    //             "image_path" => asset('assets/uploads/countryIcon/af.svg'),
                
    //         ],
    //         [
    //             "cc"=> "ag",
    //             "name"=> "Antigua and Barbuda",
    //             "image_path" => asset('assets/uploads/countryIcon/ag.svg'),
                
    //         ],
    //         [
    //             "cc"=> "ai",
    //             "name"=> "Anguilla",
    //             "image_path" => asset('assets/uploads/countryIcon/ai.svg'),
                
    //         ],
    //         [
    //             "cc"=> "al",
    //             "name"=> "Albania",
    //             "image_path" => asset('assets/uploads/countryIcon/al.svg'),
                
    //         ],
    //         [
    //             "cc"=> "am",
    //             "name"=> "Armenia",
    //             "image_path" => asset('assets/uploads/countryIcon/am.svg'),
                
    //         ],
    //         [
    //             "cc"=> "ao",
    //             "name"=> "Angola",
    //             "image_path" => asset('assets/uploads/countryIcon/ao.svg'),
                
    //         ],
    //         [
    //             "cc"=> "aq",
    //             "name"=> "Antarctica",
    //             "image_path" => asset('assets/uploads/countryIcon/aq.svg'),
    

    //         ],
    //         [
    //             "cc"=> "ar",
    //             "name"=> "Argentina",
    //             "image_path" => asset('assets/uploads/countryIcon/ar.svg'),
                
    //         ],
    //         [
    //             "cc"=> "as",
    //             "name"=> "American Samoa",
    //             "image_path" => asset('assets/uploads/countryIcon/as.svg'),
                
    //         ],
    //         [
    //             "cc"=> "at",
    //             "name"=> "Austria",
    //             "image_path" => asset('assets/uploads/countryIcon/at.svg'),
                
    //         ],
    //         [
    //             "cc"=> "au",
    //             "name"=> "Australia",
    //             "image_path" => asset('assets/uploads/countryIcon/au.svg'),
                
    //         ],
    //         [
    //             "cc"=> "aw",
    //             "name"=> "Aruba",
    //             "image_path" => asset('assets/uploads/countryIcon/aw.svg'),
                
    //         ],
    //         [
    //             "cc"=> "ax",
    //             "name"=> "\u00c5land Islands",
    //             "image_path" => asset('assets/uploads/countryIcon/ax.svg'), //
                
    //         ],
    //         [
    //             "cc"=> "az",
    //             "name"=> "Azerbaijan",
    //             "image_path" => asset('assets/uploads/countryIcon/az.webp'),
                
    //         ],
    //         [
    //             "cc"=> "ba",
    //             "name"=> "Bosnia & Herzegovina",
    //             "image_path" => asset('assets/uploads/countryIcon/ba.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bb",
    //             "name"=> "Barbados",
    //             "image_path" => asset('assets/uploads/countryIcon/bb.svg'),//
                
    //         ],
    //         [
    //             "cc"=> "bd",
    //             "name"=> "Bangladesh",
    //             "image_path" => asset('assets/uploads/countryIcon/bd.svg'),
                
    //         ],
    //         [
    //             "cc"=> "be",
    //             "name"=> "Belgium",
    //             "image_path" => asset('assets/uploads/countryIcon/be.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bf",
    //             "name"=> "Burkina Faso",
    //             "image_path" => asset('assets/uploads/countryIcon/bf.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bg",
    //             "name"=> "Bulgaria",
    //             "image_path" => asset('assets/uploads/countryIcon/bg.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bh",
    //             "name"=> "Bahrain",
    //             "image_path" => asset('assets/uploads/countryIcon/bh.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bi",
    //             "name"=> "Burundi",
    //             "image_path" => asset('assets/uploads/countryIcon/bi.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bj",
    //             "name"=> "Benin",
    //             "image_path" => asset('assets/uploads/countryIcon/bj.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bl",
    //             "name"=> "Saint Barth\u00e9lemy",
    //             "image_path" => asset('assets/uploads/countryIcon/bl.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bm",
    //             "name"=> "Bermuda",
    //             "image_path" => asset('assets/uploads/countryIcon/bm.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bn",
    //             "name"=> "Brunei",
    //             "image_path" => asset('assets/uploads/countryIcon/bn.svg'),
                
    //         ],
    //         [
    //             "cc"=> "bo",
    //             "name"=> "Bolivia",
    //             "image_path" => asset('assets/uploads/countryIcon/bo.svg'),
                
    //         ],
    //     // ------------------------------------------
    //         [
    //             "cc"=> "bq",
    //             "name"=> "Caribbean Netherlands",
    //             "image_path" => asset('assets/uploads/countryIcon/bq.svg'),
    //         ],
    //         [
    //             "cc"=> "br",
    //             "name"=> "Brazil",
    //             "image_path" => asset('assets/uploads/countryIcon/br.svg'),
    //         ],
    //         [
    //             "cc"=> "bs",
    //             "name"=> "Bahamas",
    //             "image_path" => asset('assets/uploads/countryIcon/bs.svg'),
    //         ],
    //         [
    //             "cc"=> "bt",
    //             "name"=> "Bhutan",
    //             "image_path" => asset('assets/uploads/countryIcon/bt.svg'),
    //         ],
    //         [
    //             "cc"=> "bv",
    //             "name"=> "Bouvet Island",
    //             "image_path" => asset('assets/uploads/countryIcon/bv.svg'),
    //         ],
    //         [
    //             "cc"=> "bw",
    //             "name"=> "Botswana",
    //             "image_path" => asset('assets/uploads/countryIcon/bw.svg'),
    //         ],
    //         [
    //             "cc"=> "by",
    //             "name"=> "Belarus",
    //             "image_path" => asset('assets/uploads/countryIcon/by.svg'),
    //         ],
    //         [
    //             "cc"=> "bz",
    //             "name"=> "Belize",
    //             "image_path" => asset('assets/uploads/countryIcon/bz.svg'),
    //         ],
    //         [
    //             "cc"=> "ca",
    //             "name"=> "Canada",
    //              "image_path" => asset('assets/uploads/countryIcon/ca.svg'),
    //         ],
    //         [
    //             "cc"=> "cc",
    //             "name"=> "Cocos (Keeling) Islands",
    //              "image_path" => asset('assets/uploads/countryIcon/cc.svg'),
    //         ],
    //         [
    //             "cc"=> "cd",
    //             "name"=> "Congo - Kinshasa",
    //              "image_path" => asset('assets/uploads/countryIcon/cd.svg'),
    //         ],
    //         [
    //             "cc"=> "cf",
    //             "name"=> "Central African Republic",
    //              "image_path" => asset('assets/uploads/countryIcon/cf.svg'),
    //         ],
    //         [
    //             "cc"=> "cg",
    //             "name"=> "Congo - Brazzaville",
    //              "image_path" => asset('assets/uploads/countryIcon/cg.svg'),
    //         ],
    //         [
    //             "cc"=> "ch",
    //             "name"=> "Switzerland",
    //             "image_path" => asset('assets/uploads/countryIcon/ch.svg'),
    //         ],
    //         [
    //             "cc"=> "ci",
    //             "name"=> "C\u00f4te d\u2019Ivoire",
    //             "image_path" => asset('assets/uploads/countryIcon/ci.svg'), /// image nathi mali
    //         ],
    //         [
    //             "cc"=> "ck",
    //             "name"=> "Cook Islands",
    //             "image_path" => asset('assets/uploads/countryIcon/ck.svg'), 

    //         ],
    //         [
    //             "cc"=> "cl",
    //             "name"=> "Chile",
    //             "image_path" => asset('assets/uploads/countryIcon/cl.svg'), 
    //         ],
    //         [
    //             "cc"=> "cm",
    //             "name"=> "Cameroon",
    //             "image_path" => asset('assets/uploads/countryIcon/cm.svg'), 
    //         ],
    //         [
    //             "cc"=> "cn",
    //             "name"=> "China",
    //             "image_path" => asset('assets/uploads/countryIcon/cn.svg'), 

    //         ],
    //         [
    //             "cc"=> "co",
    //             "name"=> "Colombia",
    //             "image_path" => asset('assets/uploads/countryIcon/co.svg'), 
    //         ],
    //         [
    //             "cc"=> "cr",
    //             "name"=> "Costa Rica",
    //             "image_path" => asset('assets/uploads/countryIcon/cr.svg'), 
    //         ],
    //         [
    //             "cc"=> "cu",
    //             "name"=> "Cuba",
    //             "image_path" => asset('assets/uploads/countryIcon/cu.svg'), 
    //         ],
    //         [
    //             "cc"=> "cv",
    //             "name"=> "Cape Verde",
    //             "image_path" => asset('assets/uploads/countryIcon/cv.svg'), 

    //         ],
    //         [
    //             "cc"=> "cw",
    //             "name"=> "Cura\u00e7ao",
    //             "image_path" => asset('assets/uploads/countryIcon/cw.svg'), /// square image
    //         ],
    //         [
    //             "cc"=> "cx",
    //             "name"=> "Christmas Island",
    //             "image_path" => asset('assets/uploads/countryIcon/cx.svg'), /// square image

    //         ],
    //         [
    //             "cc"=> "cy",
    //             "name"=> "Cyprus",
    //             "image_path" => asset('assets/uploads/countryIcon/cy.svg'), 

    //         ],
    //         [
    //             "cc"=> "cz",
    //             "name"=> "Czech Republic",
    //             "image_path" => asset('assets/uploads/countryIcon/cz.svg'), 

    //         ],
    //         [
    //             "cc"=> "de",
    //             "name"=> "Germany",
    //             "image_path" => asset('assets/uploads/countryIcon/de.svg'), 

    //         ],
    //         [
    //             "cc"=> "dj",
    //             "name"=> "Djibouti",
    //             "image_path" => asset('assets/uploads/countryIcon/dj.svg'), 

    //         ],
    //         [
    //             "cc"=> "dk",
    //             "name"=> "Denmark",
    //             "image_path" => asset('assets/uploads/countryIcon/dk.svg'), 

    //         ],
    //         [
    //             "cc"=> "dm",
    //             "name"=> "Dominica",
    //             "image_path" => asset('assets/uploads/countryIcon/dm.svg'), 

    //         ],
    //         [
    //             "cc"=> "do",
    //             "name"=> "Dominican Republic",
    //             "image_path" => asset('assets/uploads/countryIcon/do.svg'), 

    //         ],
    //         [
    //             "cc"=> "dz",
    //             "name"=> "Algeria",
    //             "image_path" => asset('assets/uploads/countryIcon/dz.svg'), 

    //         ],
    //         [
    //             "cc"=> "ec",
    //             "name"=> "Ecuador",
    //             "image_path" => asset('assets/uploads/countryIcon/ec.svg'), 

    //         ],
    //         [
    //             "cc"=> "ee",
    //             "name"=> "Estonia",
    //             "image_path" => asset('assets/uploads/countryIcon/ee.svg'), 
    //         ],
    //         [
    //             "cc"=> "eg",
    //             "name"=> "Egypt",
    //             "image_path" => asset('assets/uploads/countryIcon/eg.svg'), 
    //         ],
    //         [
    //             "cc"=> "eh",
    //             "name"=> "Western Sahara",
    //             "image_path" => asset('assets/uploads/countryIcon/ec.svg'), 
    //         ],
    //         [
    //             "cc"=> "er",
    //             "name"=> "Eritrea",
    //         ],
    //         [
    //             "cc"=> "es",
    //             "name"=> "Spain",
    //         ],
    //         [
    //             "cc"=> "et",
    //             "name"=> "Ethiopia"
    //         ],
    //         [
    //             "cc"=> "fi",
    //             "name"=> "Finland"
    //         ],
    //         [
    //             "cc"=> "fj",
    //             "name"=> "Fiji"
    //         ],
    //         [
    //             "cc"=> "fk",
    //             "name"=> "Falkland Islands"
    //         ],
    //         [
    //             "cc"=> "fm",
    //             "name"=> "Micronesia"
    //         ],
    //         [
    //             "cc"=> "fo",
    //             "name"=> "Faroe Islands"
    //         ],
    //         [
    //             "cc"=> "fr",
    //             "name"=> "France"
    //         ],
    //         [
    //             "cc"=> "ga",
    //             "name"=> "Gabon"
    //         ],
    //         [
    //             "cc"=> "gb",
    //             "name"=> "Great Britain"
    //         ],
    //         [
    //             "cc"=> "gd",
    //             "name"=> "Grenada"
    //         ],
    //         [
    //             "cc"=> "ge",
    //             "name"=> "Georgia"
    //         ],
    //         [
    //             "cc"=> "gf",
    //             "name"=> "French Guiana"
    //         ],
    //         [
    //             "cc"=> "gg",
    //             "name"=> "Guernsey"
    //         ],
    //         [
    //             "cc"=> "gh",
    //             "name"=> "Ghana"
    //         ],
    //         [
    //             "cc"=> "gi",
    //             "name"=> "Gibraltar"
    //         ],
    //         [
    //             "cc"=> "gl",
    //             "name"=> "Greenland"
    //         ],
    //         [
    //             "cc"=> "gm",
    //             "name"=> "Gambia"
    //         ],
    //         [
    //             "cc"=> "gn",
    //             "name"=> "Guinea"
    //         ],
    //         [
    //             "cc"=> "gp",
    //             "name"=> "Guadeloupe"
    //         ],
    //         [
    //             "cc"=> "gq",
    //             "name"=> "Equatorial Guinea"
    //         ],
    //         [
    //             "cc"=> "gr",
    //             "name"=> "Greece"
    //         ],
    //         [
    //             "cc"=> "gs",
    //             "name"=> "South Georgia & South Sandwich Islands"
    //         ],
    //         [
    //             "cc"=> "gt",
    //             "name"=> "Guatemala"
    //         ],
    //         [
    //             "cc"=> "gu",
    //             "name"=> "Guam"
    //         ],
    //         [
    //             "cc"=> "gw",
    //             "name"=> "Guinea-Bissau"
    //         ],
    //         [
    //             "cc"=> "gy",
    //             "name"=> "Guyana"
    //         ],
    //         [
    //             "cc"=> "hk",
    //             "name"=> "Hong Kong SAR China"
    //         ],
    //         [
    //             "cc"=> "hm",
    //             "name"=> "Heard & McDonald Islands"
    //         ],
    //         [
    //             "cc"=> "hn",
    //             "name"=> "Honduras"
    //         ],
    //         [
    //             "cc"=> "hr",
    //             "name"=> "Croatia"
    //         ],
    //         [
    //             "cc"=> "ht",
    //             "name"=> "Haiti"
    //         ],
    //         [
    //             "cc"=> "hu",
    //             "name"=> "Hungary"
    //         ],
    //         [
    //             "cc"=> "id",
    //             "name"=> "Indonesia"
    //         ],
    //         [
    //             "cc"=> "ie",
    //             "name"=> "Ireland"
    //         ],
    //         [
    //             "cc"=> "il",
    //             "name"=> "Israel"
    //         ],
    //         [
    //             "cc"=> "im",
    //             "name"=> "Isle of Man"
    //         ],
    //         [
    //             "cc"=> "in",
    //             "name"=> "India"
    //         ],
    //         [
    //             "cc"=> "io",
    //             "name"=> "British Indian Ocean Territory"
    //         ],
    //         [
    //             "cc"=> "iq",
    //             "name"=> "Iraq"
    //         ],
    //         [
    //             "cc"=> "ir",
    //             "name"=> "Iran"
    //         ],
    //         [
    //             "cc"=> "is",
    //             "name"=> "Iceland"
    //         ],
    //         [
    //             "cc"=> "it",
    //             "name"=> "Italy"
    //         ],
    //         [
    //             "cc"=> "je",
    //             "name"=> "Jersey"
    //         ],
    //         [
    //             "cc"=> "jm",
    //             "name"=> "Jamaica"
    //         ],
    //         [
    //             "cc"=> "jo",
    //             "name"=> "Jordan"
    //         ],
    //         [
    //             "cc"=> "jp",
    //             "name"=> "Japan"
    //         ],
    //         [
    //             "cc"=> "ke",
    //             "name"=> "Kenya"
    //         ],
    //         [
    //             "cc"=> "kg",
    //             "name"=> "Kyrgyzstan"
    //         ],
    //         [
    //             "cc"=> "kh",
    //             "name"=> "Cambodia"
    //         ],
    //         [
    //             "cc"=> "ki",
    //             "name"=> "Kiribati"
    //         ],
    //         [
    //             "cc"=> "km",
    //             "name"=> "Comoros"
    //         ],
    //         [
    //             "cc"=> "kn",
    //             "name"=> "Saint Kitts and Nevis"
    //         ],
    //         [
    //             "cc"=> "kp",
    //             "name"=> "North Korea"
    //         ],
    //         [
    //             "cc"=> "kr",
    //             "name"=> "South Korea"
    //         ],
    //         [
    //             "cc"=> "kw",
    //             "name"=> "Kuwait"
    //         ],
    //         [
    //             "cc"=> "ky",
    //             "name"=> "Cayman Islands"
    //         ],
    //         [
    //             "cc"=> "kz",
    //             "name"=> "Kazakhstan"
    //         ],
    //         [
    //             "cc"=> "la",
    //             "name"=> "Laos"
    //         ],
    //         [
    //             "cc"=> "lb",
    //             "name"=> "Lebanon"
    //         ],
    //         [
    //             "cc"=> "lc",
    //             "name"=> "Saint Lucia"
    //         ],
    //         [
    //             "cc"=> "li",
    //             "name"=> "Liechtenstein"
    //         ],
    //         [
    //             "cc"=> "lk",
    //             "name"=> "Sri Lanka"
    //         ],
    //         [
    //             "cc"=> "lr",
    //             "name"=> "Liberia"
    //         ],
    //         [
    //             "cc"=> "ls",
    //             "name"=> "Lesotho"
    //         ],
    //         [
    //             "cc"=> "lt",
    //             "name"=> "Lithuania"
    //         ],
    //         [
    //             "cc"=> "lu",
    //             "name"=> "Luxembourg"
    //         ],
    //         [
    //             "cc"=> "lv",
    //             "name"=> "Latvia"
    //         ],
    //         [
    //             "cc"=> "ly",
    //             "name"=> "Libya"
    //         ],
    //         [
    //             "cc"=> "ma",
    //             "name"=> "Morocco"
    //         ],
    //         [
    //             "cc"=> "mc",
    //             "name"=> "Monaco"
    //         ],
    //         [
    //             "cc"=> "md",
    //             "name"=> "Moldova"
    //         ],
    //         [
    //             "cc"=> "me",
    //             "name"=> "Montenegro"
    //         ],
    //         [
    //             "cc"=> "mf",
    //             "name"=> "Saint Martin"
    //         ],
    //         [
    //             "cc"=> "mg",
    //             "name"=> "Madagascar"
    //         ],
    //         [
    //             "cc"=> "mh",
    //             "name"=> "Marshall Islands"
    //         ],
    //         [
    //             "cc"=> "mk",
    //             "name"=> "Macedonia"
    //         ],
    //         [
    //             "cc"=> "ml",
    //             "name"=> "Mali"
    //         ],
    //         [
    //             "cc"=> "mm",
    //             "name"=> "Myanmar (Burma)"
    //         ],
    //         [
    //             "cc"=> "mn",
    //             "name"=> "Mongolia"
    //         ],
    //         [
    //             "cc"=> "mo",
    //             "name"=> "Macau SAR China"
    //         ],
    //         [
    //             "cc"=> "mp",
    //             "name"=> "Northern Mariana Islands"
    //         ],
    //         [
    //             "cc"=> "mq",
    //             "name"=> "Martinique"
    //         ],
    //         [
    //             "cc"=> "mr",
    //             "name"=> "Mauritania"
    //         ],
    //         [
    //             "cc"=> "ms",
    //             "name"=> "Montserrat"
    //         ],
    //         [
    //             "cc"=> "mt",
    //             "name"=> "Malta"
    //         ],
    //         [
    //             "cc"=> "mu",
    //             "name"=> "Mauritius"
    //         ],
    //         [
    //             "cc"=> "mv",
    //             "name"=> "Maldives"
    //         ],
    //         [
    //             "cc"=> "mw",
    //             "name"=> "Malawi"
    //         ],
    //         [
    //             "cc"=> "mx",
    //             "name"=> "Mexico"
    //         ],
    //         [
    //             "cc"=> "my",
    //             "name"=> "Malaysia"
    //         ],
    //         [
    //             "cc"=> "mz",
    //             "name"=> "Mozambique"
    //         ],
    //         [
    //             "cc"=> "na",
    //             "name"=> "Namibia"
    //         ],
    //         [
    //             "cc"=> "nc",
    //             "name"=> "New Caledonia"
    //         ],
    //         [
    //             "cc"=> "ne",
    //             "name"=> "Niger"
    //         ],
    //         [
    //             "cc"=> "nf",
    //             "name"=> "Norfolk Island"
    //         ],
    //         [
    //             "cc"=> "ng",
    //             "name"=> "Nigeria"
    //         ],
    //         [
    //             "cc"=> "ni",
    //             "name"=> "Nicaragua"
    //         ],
    //         [
    //             "cc"=> "nl",
    //             "name"=> "Netherlands"
    //         ],
    //         [
    //             "cc"=> "no",
    //             "name"=> "Norway"
    //         ],
    //         [
    //             "cc"=> "np",
    //             "name"=> "Nepal"
    //         ],
    //         [
    //             "cc"=> "nr",
    //             "name"=> "Nauru"
    //         ],
    //         [
    //             "cc"=> "nu",
    //             "name"=> "Niue"
    //         ],
    //         [
    //             "cc"=> "nz",
    //             "name"=> "New Zealand"
    //         ],
    //         [
    //             "cc"=> "om",
    //             "name"=> "Oman"
    //         ],
    //         [
    //             "cc"=> "pa",
    //             "name"=> "Panama"
    //         ],
    //         [
    //             "cc"=> "pe",
    //             "name"=> "Peru"
    //         ],
    //         [
    //             "cc"=> "pf",
    //             "name"=> "French Polynesia"
    //         ],
    //         [
    //             "cc"=> "pg",
    //             "name"=> "Papua New Guinea"
    //         ],
    //         [
    //             "cc"=> "ph",
    //             "name"=> "Philippines"
    //         ],
    //         [
    //             "cc"=> "pk",
    //             "name"=> "Pakistan"
    //         ],
    //         [
    //             "cc"=> "pl",
    //             "name"=> "Poland"
    //         ],
    //         [
    //             "cc"=> "pm",
    //             "name"=> "Saint Pierre and Miquelon"
    //         ],
    //         [
    //             "cc"=> "pn",
    //             "name"=> "Pitcairn Islands"
    //         ],
    //         [
    //             "cc"=> "pr",
    //             "name"=> "Puerto Rico"
    //         ],
    //         [
    //             "cc"=> "ps",
    //             "name"=> "Palestinian Territories"
    //         ],
    //         [
    //             "cc"=> "pt",
    //             "name"=> "Portugal"
    //         ],
    //         [
    //             "cc"=> "pw",
    //             "name"=> "Palau"
    //         ],
    //         [
    //             "cc"=> "py",
    //             "name"=> "Paraguay"
    //         ],
    //         [
    //             "cc"=> "qa",
    //             "name"=> "Qatar"
    //         ],
    //         [
    //             "cc"=> "re",
    //             "name"=> "R\u00e9union"
    //         ],
    //         [
    //             "cc"=> "ro",
    //             "name"=> "Romania"
    //         ],
    //         [
    //             "cc"=> "rs",
    //             "name"=> "Serbia"
    //         ],
    //         [
    //             "cc"=> "ru",
    //             "name"=> "Russia"
    //         ],
    //         [
    //             "cc"=> "rw",
    //             "name"=> "Rwanda"
    //         ],
    //         [
    //             "cc"=> "sa",
    //             "name"=> "Saudi Arabia"
    //         ],
    //         [
    //             "cc"=> "sb",
    //             "name"=> "Solomon Islands"
    //         ],
    //         [
    //             "cc"=> "sc",
    //             "name"=> "Seychelles"
    //         ],
    //         [
    //             "cc"=> "sd",
    //             "name"=> "Sudan"
    //         ],
    //         [
    //             "cc"=> "se",
    //             "name"=> "Sweden"
    //         ],
    //         [
    //             "cc"=> "sg",
    //             "name"=> "Singapore"
    //         ],
    //         [
    //             "cc"=> "sh",
    //             "name"=> "Saint Helena"
    //         ],
    //         [
    //             "cc"=> "si",
    //             "name"=> "Slovenia"
    //         ],
    //         [
    //             "cc"=> "sj",
    //             "name"=> "Svalbard and Jan Mayen"
    //         ],
    //         [
    //             "cc"=> "sk",
    //             "name"=> "Slovakia"
    //         ],
    //         [
    //             "cc"=> "sl",
    //             "name"=> "Sierra Leone"
    //         ],
    //         [
    //             "cc"=> "sm",
    //             "name"=> "San Marino"
    //         ],
    //         [
    //             "cc"=> "sn",
    //             "name"=> "Senegal"
    //         ],
    //         [
    //             "cc"=> "so",
    //             "name"=> "Somalia"
    //         ],
    //         [
    //             "cc"=> "sr",
    //             "name"=> "Suriname"
    //         ],
    //         [
    //             "cc"=> "ss",
    //             "name"=> "South Sudan"
    //         ],
    //         [
    //             "cc"=> "st",
    //             "name"=> "S\u00e3o Tom\u00e9 and Pr\u00edncipe"
    //         ],
    //         [
    //             "cc"=> "sv",
    //             "name"=> "El Salvador"
    //         ],
    //         [
    //             "cc"=> "sx",
    //             "name"=> "Sint Maarten"
    //         ],
    //         [
    //             "cc"=> "sy",
    //             "name"=> "Syria"
    //         ],
    //         [
    //             "cc"=> "sz",
    //             "name"=> "Swaziland"
    //         ],
    //         [
    //             "cc"=> "tc",
    //             "name"=> "Turks and Caicos Islands"
    //         ],
    //         [
    //             "cc"=> "td",
    //             "name"=> "Chad"
    //         ],
    //         [
    //             "cc"=> "tf",
    //             "name"=> "French Southern Territories"
    //         ],
    //         [
    //             "cc"=> "tg",
    //             "name"=> "Togo"
    //         ],
    //         [
    //             "cc"=> "th",
    //             "name"=> "Thailand"
    //         ],
    //         [
    //             "cc"=> "tj",
    //             "name"=> "Tajikistan"
    //         ],
    //         [
    //             "cc"=> "tk",
    //             "name"=> "Tokelau"
    //         ],
    //         [
    //             "cc"=> "tl",
    //             "name"=> "Timor-Leste"
    //         ],
    //         [
    //             "cc"=> "tm",
    //             "name"=> "Turkmenistan"
    //         ],
    //         [
    //             "cc"=> "tn",
    //             "name"=> "Tunisia"
    //         ],
    //         [
    //             "cc"=> "to",
    //             "name"=> "Tonga"
    //         ],
    //         [
    //             "cc"=> "tr",
    //             "name"=> "Turkey"
    //         ],
    //         [
    //             "cc"=> "tt",
    //             "name"=> "Trinidad and Tobago"
    //         ],
    //         [
    //             "cc"=> "tv",
    //             "name"=> "Tuvalu"
    //         ],
    //         [
    //             "cc"=> "tw",
    //             "name"=> "Taiwan"
    //         ],
    //         [
    //             "cc"=> "tz",
    //             "name"=> "Tanzania"
    //         ],
    //         [
    //             "cc"=> "ua",
    //             "name"=> "Ukraine"
    //         ],
    //         [
    //             "cc"=> "ug",
    //             "name"=> "Uganda"
    //         ],
    //         [
    //             "cc"=> "um",
    //             "name"=> "U.S. Outlying Islands"
    //         ],
    //         [
    //             "cc"=> "us",
    //             "name"=> "USA"
    //         ],
    //         [
    //             "cc"=> "uy",
    //             "name"=> "Uruguay"
    //         ],
    //         [
    //             "cc"=> "uz",
    //             "name"=> "Uzbekistan"
    //         ],
    //         [
    //             "cc"=> "va",
    //             "name"=> "Vatican City"
    //         ],
    //         [
    //             "cc"=> "vc",
    //             "name"=> "St. Vincent & Grenadines"
    //         ],
    //         [
    //             "cc"=> "ve",
    //             "name"=> "Venezuela"
    //         ],
    //         [
    //             "cc"=> "vg",
    //             "name"=> "British Virgin Islands"
    //         ],
    //         [
    //             "cc"=> "vi",
    //             "name"=> "U.S. Virgin Islands"
    //         ],
    //         [
    //             "cc"=> "vn",
    //             "name"=> "Vietnam"
    //         ],
    //         [
    //             "cc"=> "vu",
    //             "name"=> "Vanuatu"
    //         ],
    //         [
    //             "cc"=> "wf",
    //             "name"=> "Wallis and Futuna"
    //         ],
    //         [
    //             "cc"=> "ws",
    //             "name"=> "Samoa"
    //         ],
    //         [
    //             "cc"=> "xk",
    //             "name"=> "Kosovo"
    //         ],
    //         [
    //             "cc"=> "ye",
    //             "name"=> "Yemen"
    //         ],
    //         [
    //             "cc"=> "yt",
    //             "name"=> "Mayotte"
    //         ],
    //         [
    //             "cc"=> "za",
    //             "name"=> "South Africa"
    //         ],
    //         [
    //             "cc"=> "zm",
    //             "name"=> "Zambia"
    //         ],
    //         [
    //             "cc"=> "zw",
    //             "name"=> "Zimbabwe"
    //         ]


    //         // ... (other data and image paths go here)
    //     ];

    //     // Create the response JSON
    //     $response = [
    //         "results" => $data,
    //     ];

    //     // Convert the array to JSON
    //     $jsonContent = json_encode($response, JSON_PRETTY_PRINT);
    //     // Save the JSON content to the countries.json file
    //     file_put_contents(base_path('assets/country/countries.json'), $jsonContent);

    //     return "countries.json file has been updated.";
    // }

    public function index()
    {
        $templateSection = ['hero', 'contact-us'];
        $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
        ->whereHas('content', function ($query) use ($contentSection) {
            return $query->whereIn('name', $contentSection);
        })
        ->with(['content:id,name',
            'content.contentMedia' => function ($q) {
                $q->select(['content_id', 'description']);
            }])
        ->get()->groupBy('content.name');

        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();

        return view($this->theme . 'home', $data);
    }

    public function category($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
        ->whereHas('content', function ($query) use ($contentSection) {
            return $query->whereIn('name', $contentSection);
        })
        ->with(['content:id,name',
            'content.contentMedia' => function ($q) {
                $q->select(['content_id', 'description']);
            }])
        ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        return view($this->theme . 'home', $data);
    }


    public function tournament($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
        ->whereHas('content', function ($query) use ($contentSection) {
            return $query->whereIn('name', $contentSection);
        })
        ->with(['content:id,name',
            'content.contentMedia' => function ($q) {
                $q->select(['content_id', 'description']);
            }])
        ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        return view($this->theme . 'home', $data);
    }

    public function match($slug = null, $id)
    {
        $contentSection = ['slider'];
        $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
        ->whereHas('content', function ($query) use ($contentSection) {
            return $query->whereIn('name', $contentSection);
        })
        ->with(['content:id,name',
            'content.contentMedia' => function ($q) {
                $q->select(['content_id', 'description']);
            }])
        ->get()->groupBy('content.name');
        $data['gameCategories'] = GameCategory::with(['activeTournament'])->withCount('gameActiveMatch')->whereStatus(1)->orderBy('game_active_match_count', 'desc')->get();
        
        return view($this->theme . 'home', $data);
    }
    public function condition()
    {
       return view($this->theme . 'home');
   }
   public function policy()
   {
       return view($this->theme . 'home');
   }
   public function bonusterm(){
    return view($this->theme . 'home');
}
public function gambling(){
    return view($this->theme . 'home');
}
public function kyc_policy(){
    return view($this->theme . 'home');
}
public function casino_promotion(){
    return view($this->theme . 'home');
}
public function sport_promotion(){
    return view($this->theme . 'home');
}
public function deposit_withdraw(){
    return view($this->theme . 'home');
}
public function sportStat(){
    return view($this->theme . 'home');
}
public function casino(){
    return view($this->theme . 'casino');
}
public function slot(){
    return view($this->theme . 'slot');
}


public function about()
{
        // $templateSection = ['about-us', 'testimonial'];
        // $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

        // $contentSection = ['testimonial'];
        // $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
        //     ->whereHas('content', function ($query) use ($contentSection) {
        //         return $query->whereIn('name', $contentSection);
        //     })
        //     ->with(['content:id,name',
        //         'content.contentMedia' => function ($q) {
        //             $q->select(['content_id', 'description']);
        //         }])
        //     ->get()->groupBy('content.name');
        // return view($this->theme . 'about', $data);
    return view($this->theme . 'home');
}


public function blog()
{
    $data['title'] = "Blog";
    $contentSection = ['blog'];

    $templateSection = ['blog'];
    $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

    $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
    ->whereHas('content', function ($query) use ($contentSection) {
        return $query->whereIn('name', $contentSection);
    })
    ->with(['content:id,name',
        'content.contentMedia' => function ($q) {
            $q->select(['content_id', 'description']);
        }])
    ->get()->groupBy('content.name');
    return view($this->theme . 'blog', $data);
}

public function blogDetails($slug = null, $id)
{
    $getData = Content::findOrFail($id);

    $contentSection = [$getData->name];
    $contentDetail = ContentDetails::select('id', 'content_id', 'description', 'created_at')
    ->where('content_id', $getData->id)
    ->whereHas('content', function ($query) use ($contentSection) {
        return $query->whereIn('name', $contentSection);
    })
    ->with(['content:id,name',
        'content.contentMedia' => function ($q) {
            $q->select(['content_id', 'description']);
        }])
    ->get()->groupBy('content.name');

    $singleItem['title'] = @$contentDetail[$getData->name][0]->description->title;
    $singleItem['description'] = @$contentDetail[$getData->name][0]->description->description;
    $singleItem['date'] = dateTime(@$contentDetail[$getData->name][0]->created_at, 'd M, Y');
    $singleItem['image'] = getFile(config('location.content.path') . @$contentDetail[$getData->name][0]->content->contentMedia->description->image);


    $contentSectionPopular = ['blog'];
    $popularContentDetails = ContentDetails::select('id', 'content_id', 'description', 'created_at')
    ->where('content_id', '!=', $getData->id)
    ->whereHas('content', function ($query) use ($contentSectionPopular) {
        return $query->whereIn('name', $contentSectionPopular);
    })
    ->with(['content:id,name',
        'content.contentMedia' => function ($q) {
            $q->select(['content_id', 'description']);
        }])
    ->get()->groupBy('content.name');


    return view($this->theme . 'blogDetails', compact('singleItem', 'popularContentDetails'));
}


public function faq()
{

    $templateSection = ['faq'];
    $data['templates'] = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');

    $contentSection = ['faq'];
    $data['contentDetails'] = ContentDetails::select('id', 'content_id', 'description', 'created_at')
    ->whereHas('content', function ($query) use ($contentSection) {
        return $query->whereIn('name', $contentSection);
    })
    ->with(['content:id,name',
        'content.contentMedia' => function ($q) {
            $q->select(['content_id', 'description']);
        }])
    ->get()->groupBy('content.name');

    $data['increment'] = 1;
    return view($this->theme . 'faq', $data);
}

public function contact()
{
    $templateSection = ['contact-us'];
    $templates = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');
    $title = 'Contact Us';
    $contact = @$templates['contact-us'][0]->description;

    return view($this->theme . 'contact', compact('title', 'contact'));
}

public function contactSend(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:50',
        'email' => 'required|email|max:91',
        'subject' => 'required|max:100',
        'message' => 'required|max:1000',
    ]);
    $requestData = Purify::clean($request->except('_token', '_method'));

    $basic = (object)config('basic');
    $basicEmail = $basic->sender_email;

    $name = $requestData['name'];
    $email_from = $requestData['email'];
    $subject = $requestData['subject'];
    $message = $requestData['message'] . "<br>Regards<br>" . $name;
    $from = $email_from;

    $headers = "From: <$from> \r\n";
    $headers .= "Reply-To: <$from> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $to = $basicEmail;

    if (@mail($to, $subject, $message, $headers)) {
            // echo 'Your message has been sent.';
    } else {
            //echo 'There was a problem sending the email.';
    }

    return back()->with('success', 'Mail has been sent');
}

public function getLink($getLink = null, $id)
{
    $getData = Content::findOrFail($id);

    $contentSection = [$getData->name];
    $contentDetail = ContentDetails::select('id', 'content_id', 'description', 'created_at')
    ->where('content_id', $getData->id)
    ->whereHas('content', function ($query) use ($contentSection) {
        return $query->whereIn('name', $contentSection);
    })
    ->with(['content:id,name',
        'content.contentMedia' => function ($q) {
            $q->select(['content_id', 'description']);
        }])
    ->get()->groupBy('content.name');

    $title = @$contentDetail[$getData->name][0]->description->title;
    $description = @$contentDetail[$getData->name][0]->description->description;
    return view($this->theme . 'getLink', compact('contentDetail', 'title', 'description'));
}

public function subscribe(Request $request)
{
    $rules = [
        'email' => 'required|email|max:255|unique:subscribers'
    ];
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return redirect(url()->previous() . '#subscribe')->withErrors($validator);
    }
    $data = new Subscriber();
    $data->email = $request->email;
    $data->save();
    return redirect(url()->previous() . '#subscribe')->with('success', 'Subscribed Successfully');
}

public function language($code)
{
    $language = Language::where('short_name', $code)->first();
    if (!$language) $code = 'US';
    session()->put('trans', $code);
    session()->put('rtl', $language ? $language->rtl : 0);
    return redirect()->back();
}

public function betResult()
{
    $data['betResult'] = GameMatch::with(['gameQuestions.gameOptionResult', 'gameTeam1', 'gameTeam2'])
    ->whereHas('gameQuestions.gameOptionResult', function ($qq) {
        $qq->where('result', '1');
    })
    ->where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
    return view($this->theme . 'user.betResult.index', $data);
}

}
