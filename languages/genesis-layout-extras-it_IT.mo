��    p      �  �         p	  �   q	     
     
  �   #
  E     �   Y     �     �  x   �     v     �     �     �     �     �     �     �     	      (     I     i     �  >   �     �  	   �  z   �     f     }      �     �  "   �     �     �  9   �     !  *   9     d     �     �     �     �     �     �     �  �        �     �     �     �  "   �       v   )  m   �               9     X     v     �     �     �  !   �      �          '     0     B     Q     V     d     w     �     �     �     �     �  ?   �  W     !   o     �     �  '   �     �     �  
   �  7     _   :  �  �  |  t  �   �  �   �  O  �  �   �     |     �     �     �     �  /   �  Q   �     N     Z     r  Z  �     �  $   �           (      @      U   <   q   S  �   �   "     �"     �"  �   �"  d   �#  �   $  
   �$     �$  �   �$     c%     �%     �%     �%     �%     �%     �%  +   &  (   -&  &   V&  &   }&     �&     �&  ?   �&      '     ''  �   /'     �'     �'     �'     �'     �'     (     (  F   ((     o(  +   �(     �(      �(     �(     )     )     .)     D)     L)  �   a)     *     $*     -*     ;*  #   C*     g*  �   {*  �   +     �+     �+     �+     �+      ,     ,     /,     C,  !   ],      ,     �,     �,     �,     �,     �,     �,     �,     -     !-  +   <-  +   h-     �-     �-  =   �-  O   �-     :.     Z.     k.  )   t.     �.     �.     �.  B   �.  V   /  �  v/  I  �1  �   G3  �   4  R  �4  �   26  
   �6     �6     7  +   7     :7  1   L7  X   ~7     �7     �7     �7  6  8     G9  (   S9     |9     �9     �9     �9  <   �9     5   ]   :   2   Q   #       =       $       o   S   i   0             +   ,          Y       B      G   7   N         -       h              I            D   J   l      T   !              >   c       f       d      C   L   3   ;                  6       
   j   m   	      F   \   a   O       e           '   H          _       ?       .              /       K   %   R       (   E   g   p         V   `   P   ^   1          "      <   W                  @       A      M      k   n   *               4   Z   b   X      9   )   [             &   8          U        %1$sGenesis Default%2$s in the drop-down menus below always means the chosen default layout option in the regular <a href="%3$s">Genesis layout settings</a>. 1.5 404 Page Layout ALL available options <em>on this page</em> are resetted to their defaults! So if you only want to reset <em>one</em> option and leave all other as they are then only change this one section and then click the SAVE button and you are done. ALL extra layout settings were reset to their Genesis default option. Actually it just restores the default layout setting which is always defined in regular layout settings on the Genesis Theme Settings page. Answer Archive Sections Are you sure you want to reset? - When resetting, ALL extra layout settings will be set to their Genesis default option! Attachment Page Layout Author Author - License Author Page Layout Category Page Layout Child Theme Support Content-Sidebar Content-Sidebar-Sidebar Date Archive - Day Page Layout Date Archive - Month Page Layout Date Archive - Year Page Layout Date Archive Page Layout David Decker - DECKERWEB David Decker of %1$sdeckerweb.de%2$s and %3$sGenesisThemes%4$s Donate Donations Done via %1$sWordPress.org plugin page support forum%2$s. - Maybe I will setup my own support forum in the future, though. Easy Digital Downloads FAQ FAQ - Frequently Asked Questions Facebook Feedback and more about the Author Forum Full Width Content GPLv2 or later - %1$sMore info on the GPL license ...%2$s Genesis - Layout Extras Genesis Connect for Easy Digital Downloads Genesis Connect for Jigoshop Genesis Connect for WooCommerce Genesis Default Genesis Layout Extras Genesis Media Project Go to the settings page Google+ Hompage Layout If you like the plugin please %1$srate at WordPress.org%2$s with 5 stars. <em>Thank you!</em> &mdash; %3$sMore plugins for Genesis Framework and WordPress in general by DECKERWEB%4$s Integration plugin Jigoshop Layout Extras License Listing Post Type Layout (archive) Page Page Layout Please %1$sdonate to support the further maintenance and development%2$s of the plugin. <em>Thank you in advance!</em> Please contribute to existing or new translations on %sour free translations platform%s powered by GlotPress. Plugin Support Plugin: AgentPress Listings Plugin: Easy Digital Downloads Plugin: Genesis Layout Extras Plugin: Genesis Media Project Plugin: Jigoshop Plugin: WooCommerce Plugin: bbPress 2.x Forum Plugin: bbPress 2.x Forum Section Plugins: WooCommerce OR Jigoshop Post Page Layout Question Rating &amp; Tips Reset Settings Save Save Settings Search Page Layout Settings Sidebar-Content Sidebar-Content-Sidebar Sidebar-Sidebar-Content Singular Pages Social: Some settings seem to have no effect at all, what happens here? Sorry, you can&rsquo;t activate unless you have installed the %1$sGenesis Framework%2$s Special Custom Post Type Sections Special Sections Support Support - Donations - Rating &amp; Tips Tag Page Layout Taxonomy Page Layout Thank You! The extra layout settings have been saved successfully. There are two layout options for the plugin AgentPress Listings post type. What does that mean? This has to do with priorities. In general, if there is a template for a specific page (archive) type, for example <code>image.php</code> for image attachment display, then Genesis & WordPress will always use that first for the content output AS LONG AS there is an layout setting function or filter in there. Only if there are no templates with layout settings found, the layout option settings will take full effect. So, if our example <code>image.php</code> has a layout filter set in this then has the higher priority but if there is no layout filter in there then the layout setting of the plugin will take effect! - Well, if you experience such cases just leave these fields on "Genesis Default" and you are good to go :-). This is the case when a child theme does not support one or more specific layout options. For example: When a child has unregistered the layout option "Sidebar-Sidebar-Content" then the plugin setting of "Sidebar-Sidebar-Content" will have no effect at all. This is absolutely logical behavior because the plugin can only set options which are supported by the active child theme. This is the general setting for date archives and overwrites the following three settings (Year, Month, Day)! So, if you setup any of the following three settings then let this one here on %1$sGenesis Default%2$s. This plugin for Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search, 404 and even bbPress 2.x pages via Genesis theme settings. This plugin for the Genesis Theme Framework allows modifying of default layouts for homepage, singular, archive, attachment, search and 404 pages via an options page under the Genesis menu. In addition you can also modify the default layout option for pages generated by the bbPress 2.x forum plugin and the AgentPress Listings plugin. This setting works for homepage templates (file %1$shome.php%2$s is there - %1$sis_home()%2$s) <u>and</u> also for static pages as front page (%1$sis_front_page()%2$s). Translations Twitter Website What means Reset of settings? What the Plugin Does Which settings are effected when doing a reset? With my child theme some of the layout options have no effect, what happens here? WooCommerce WooCommerce OR Jigoshop WordPress Defaults You just can set the layout option for the archive pages of the "listings" post type, plus for all terms of its built-in "features" taxonomy. - &mdash; Of course, the plugin (and so the setting here) could be used with the %3$sAgentPress child theme%4$s and also with any other Genesis child theme, so this setting might come in really handy ;-). bbPress 2.x bbPress 2.x Forum Layout (all areas) bbPress Genesis Extend by Themedy Themes Brand http://deckerweb.de/ http://genesisthemes.de/en/ http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/ PO-Revision-Date: 2012-09-05 17:21+0100
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: GlotPress/0.1
Project-Id-Version: Genesis Layout Extras
POT-Creation-Date: 
Last-Translator: David Decker <deckerweb.mobil@googlemail.com>
Language-Team: 
 %1$sGenesis Default%2$s nel menu a tendina significa il layout opzioni di default scelto nelle normali impostazioni layout del <a href="%3$s">Genesis</a>. 1.5 Layout della pagina 404 TUTTE le opzioni disponibili <em>in questa pagina</em> vengono resettate al loro default! Quindi se volete resettare solo <em>una</em> opzione e lasciare le altre invariate, modificate semplicemente quella e SALVATE le impostazioni. TUTTE le impostazioni extra del layout saranno resettate a quelle default delle opzioni del Genesis. In realtà ripristina solo l'impostazione del layout di default, che è sempre definito nelle impostazioni di layout nelle impostazioni del Tema Genesis della pagina. Rispondere Sezione Archivio Sei sicuro di voler resettare? - Quando fai questa operazione, TUTTE le impostazioni extra dei layout saranno riportate a quelle di default del Genesis! Layout delle pagine Allegati Autore Autore - Licenza Layout della pagina Autore Layout della pagina Categoria Child Theme Supporto Contenuto - barra laterale Contenuto - barra laterale - barra laterale Archivio per data - Layout pagina Giorno Archivio per data - Layout pagina Mese Archivio per data - Layout pagina Anno Layout pagina Archivio per Data David Decker - DECKERWEB.de David Decker di %1$sdeckerweb.de%2$s e %3$sGenesisThemes.de%4$s Donate Aiutaci Via %1$sWordPress.org nelle pagine plugin del forum di supporto%2$s. - In futuro forse troverete un forum di supporto proprio, forse!. Easy Digital Downloads FAQ FAQ - Domande Frequenti Facebook Feedback e più su l'Autore Foro Contenuto Full-Width GPLv2 o versione successiva - %1$sAltre info sulla licenza GPL ...%2$s Genesis - Layout Extras Genesis Connect pour Easy Digital Downloads Genesis Connect pour Jigoshop Genesis Connect pour WooCommerce Genesis Default Genesis Layout Extras Genesis Media Project Vai alle Impostazioni Google+ Layout della Hompage Se il plugin vi piace per favore %1$svotatelo su WordPress.org%2$s con 5 stelle. <em>Grazie!</em> &mdash; %3$sAltri plugins per Genesis Framework e WordPress by DECKERWEB%4$s Integrazione plugin Jigoshop Layout Extras Licenza Listing Post Type Layout (archivio) Layout delle Pagine Per favore %1$sdonate per supportare il mantenimento, la distribuzione e le nuove implementazioni%2$s di questo plugin. <em>Grazie mille in anticipo!</em> Si prega di contribuire a traduzioni esistenti o di nuova sulla %snostra piattaforma gratuita traduzioni%s powered by GlotPress. Plugin Supporto Plugin: AgentPress Listings Plugin: Easy Digital Downloads Plugin: Genesis Layout Extras Plugin: Genesis Media Project Plugin: Jigoshop Plugin: WooCommerce Plugin: bbPress 2.x Forum Plugin: Sezione Forum bbPress 2.x Plugins: WooCommerce OU Jigoshop Layout dei singoli Post Domanda Voti &amp; Trucchi Reset Impostazioni Salva Salva Impostazioni Layout della Ricerca Impostazioni Barra laterale - contenuto Barra laterale - contenuto - barra laterale Barra laterale - barra laterale - contenuto Singole Pagine Sociale: Alcune impostazioni sembra che non abbiano effetto, come mai? Spiacente, non puoi attivare prima di aver installato %1$sGenesis Framework%2$s Personalizzazioni del Post Type Sezioni Speciali Supporto Supporto - Donazioni - Voti &amp; Trucchi Layout della pagina Tag Layout della pagina Taxonomia Grazie! Le impostazioni extra del layout sono state salvate correttamente. Esiste una opzione layout per il plugin AgentPress Listings post type. Cosa significa? Questo dipende dalle proprietà. In generale, se esiste un template per una pagina generale (archivio), per esempio <code>image.php</code> per visulizzare gli allegati, Genesis & WordPress utilizzano questa per visualizzare il contenuto FINO A CHE esiste la funzione impostazioni di layout o filtro nella stessa. Solo se ci sono template sena possibilità di impostazioni, le opzioni saranno completamente effettive. Quindi, se ad esempio <code>image.php</code> ha un proprio filtro di layout questo ha la priorità, diversamente hanno effetto quelle del plugin! - Quindi, in questo caso lasciate i campi su  "Genesis Default" e siete pronti :-). Questo è il caso in cui il child theme una o più opzioni specifiche di layout. Per esempio: quando il tema non ha le opzioni registrate "Sidebar-Sidebar-Content" allora le impostazioni del plugin "Sidebar-Sidebar-Content" non hanno effetto. Questo è assolutamente logico perchè il plugin può agire solo dove gli è permesso. Queste sono le impostazioni generali per gli archivi per data e riscrive le seguenti 3 impostazioni (Anno, Mese, Giorno)! Quindi, se le modifichi lascia queste come %1$sGenesis Default%2$s. Questo plugin per Genesis Theme Framework permette la modifica del layout predefinito per homepage, post, pagina, archivio, allegati, ricerca, pagine 404 e persino bbPress 2.x tramite impostazioni del tema di Genesis. Questo plugin per Genesis Theme Framework permette di modificare i layout di default per homepage, post, pagine, archivio, allegati, ricerca e pagine 404 attraverso le opzioni del menu Genesis. Inoltre è possibile anche modificare l'opzione di layout predefinito per le pagine generate dai plugin bbPress 2.x forum e AgentPress Listings. Questa impostazione funziona per i modelli di homepage (file %1$shome.php%2$s - %1$sis_home()%2$s) <u>e</u> anche per le pagine statiche impostate come prima pagina (%1$sis_front_page()%2$s). Traduzioni Twitter Sito Web Cosa significa il reset delle impostazioni? Cosa fa il Plugin Quali impostazioni vengono modificate se resetto? Con il mio tema figlio alcune delle opzioni di layout non hanno alcun effetto, come mai? WooCommerce WooCommerce O Jigoshop WordPress predefiniti Puoi impostare le opzioni di layout per le pagine archivio delle \"listings\" post type. &mdash; Chiaramente, il plugin (e anche queste impostazioni) potrebbero essere usate con %3$sAgentPress child theme%4$s e con ogni altro Genesis child theme, così questa impostazione potrebbe rivelarsi davvero utile ;-). bbPress 2.x bbPress 2.x Forum Layout (tutte le aree) bbPress Genesis Extend by Themedy Themes marca http://deckerweb.de/ http://genesisthemes.de/en/ http://genesisthemes.de/en/wp-plugins/genesis-layout-extras/ 