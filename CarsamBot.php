<?php #php codes begins here

                   ini_set ('error_reporting', E_ALL);

                   $botToken = "278708135:AAGvYIWeIrAKBCZN6Ox0EUlzryPD6qeFYDM";
                   $website = "https://api.telegram.org/bot".$botToken;

                   $update = file_get_contents($website."/getupdates");
                   $updateArray = json_decode($update, TRUE);

                   $chatId = end($updateArray['result'])["message"]["chat"]["id"];
                   $clientName = end($updateArray['result'])['message']['chat']['first_name'];
	                $message = end($updateArray['result'])['message']['text'];

                   switch ($message) {
                     case "/test":
                       # code...
                       file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=test");
                       break;

                       case "/hi":
                         # code...
                         file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=Hey there! Do you want to keep abreast with the security news around you. /yes to continue");
                         break;
                           
                       case "/yes":
                           file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=Information Disclosure Flaws Patched in VMware Products
                           VMware has published two security advisories on Tuesday to inform customers of patches that address information disclosure vulnerabilities in several of the company’s products.

One of the advisories describes three important flaws affecting VMware vCenter Server, vSphere Client and vRealize Automation. Researchers from Positive Technologies discovered XML External Entity (XXE) vulnerabilities that can lead to information disclosure and, in some cases, to a denial-of-service (DoS) condition.

One issue is related to the single sign-on functionality, while another affects the Log Browser, the Distributed Switch setup and the Content Library. An attacker can exploit the flaws using specially crafted XML requests sent to the server.

The third XXE bug impacts the vSphere Client and it can be exploited if the attacker can trick a legitimate user into connecting to a malicious vCenter Server or ESXi instance.

The security holes, tracked as CVE-2016-7458, CVE-2016-7459 and CVE-2016-7460, have been patched with the release of vSphere Client 6.0 U2s and 5.5 U3e, vCenter Server 6.0 U2s and 5.5 U3e, and vRealize Automation 6.2.5. In the case of vSphere Client, VMware recommends uninstalling the application and reinstalling a patched version.

The second advisory published this week by VMware describes CVE-2016-5334, a moderate-severity information disclosure flaw in Identity Manager and vRealize Automation. The vendor noted that the weakness, which is similar to a directory traversal, can allow an attacker to only access folders that don’t contain any sensitive data.

The security holes have been fixed in Identity Manager 2.7.1 and vRealize Automation 7.2.0. vRealize Automation 7.x is affected by this bug as it includes an RPM-based version of Identity Manager.

VMware also informed customers that it has updated two advisories, including the one covering the Linux kernel flaw known as Dirty COW.

Earlier this month, white hat hackers who took part in the PwnFest competition in South Korea managed to find a critical VMware Workstation vulnerability that can be exploited from the guest to execute arbitrary code on the host operating system. The organizers awarded the researchers $150,000 for their guest-to-host escape. /next for another news");
                           break;
                           
                       case "/next":
                       # code...
                       file_get_contents($website."/sendMessage?chat_id=".$chatId."&text=Organizations in Asia Targeted With InPage Zero-Day. Attacks launched recently against financial and government organizations in Asia leveraged a zero-day vulnerability in the InPage word processor, Kaspersky Lab reported on Wednesday. InPage is a word processor for languages such as Urdu, Persian, Pashto and Arabic. The product is widely used in Asia and some other parts of the world, including by media companies, academies, libraries, banks and government organizations. While analyzing a target that had been hit with various types of exploits, Kaspersky Lab researchers discovered an exploit file that had an InPage (.inp) extension. The file contained a shellcode that was triggered on several InPage versions. The shellcode decrypts itself and an EXE file embedded in the malicious document. 'InPage uses its own proprietary file format that is based on the Microsoft Compound File Format. The parser in the software’s main module ‘inpage.exe’ contains a vulnerability when parsing certain fields. By carefully setting such a field in the document, an attacker can control the instruction flow and achieve code execution,’ explained Kaspersky researcher Denis Legezo. In the attacks observed by the security firm, threat groups sent spear-phishing emails carrying the InPage exploit to various government and financial institutions in Asia and Africa, in countries such as Myanmar, Sri-Lanka and Uganda. Since the exploit has been leveraged to deliver various backdoors and keyloggers, researchers believe the zero-day has likely been used by multiple actors. Kaspersky said it had attempted to inform InPage about the zero-day, but without success. SecurityWeek has reached out to InPage developers and will update this article if they provide any information. While threat actors typically leverage vulnerabilities in software used worldwide (e.g. Microsoft Office), flaws in products such as InPage can also be highly useful for more localized and targeted attacks. Another example is the Hangul Word Processor (HWP), which is popular in South Korea. Last year, experts reported that a zero-day in HWP had been used in attacks launched by an actor believed to be associated with North Korea. However, unlike InPage, the developers of HWP seem to be more interested in security and they often release updates that patch vulnerabilities. /next2 for more news");
                       break;

                     default:
                       # code...
                       sendMessage($chatId, "default");
                       break;
                   }

                   function sendMessage ($chatid, $message) {

                     $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
                     file_get_contents($url);

                   }
?>

<h2>Test</h2>
