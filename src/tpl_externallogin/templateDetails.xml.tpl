<?xml version="1.0" encoding="utf-8"?>
<extension type="template" version="2.5" client="administrator" method="upgrade">

	<name>externallogin</name>

	<!-- The following elements are optional and free of formatting conttraints -->
	<creationDate>May 2012</creationDate>
	<author>Christophe Demko</author>
	<authorEmail>external-login@chdemko.com</authorEmail>
	<authorUrl>http://www.chdemko.com</authorUrl>
	<copyright>Copyright (C) 2012 Christophe Demko.</copyright>
	<license>http://www.gnu.org/licenses/gpl-2.0.html</license>

	<!--  The version string is recorded in the extension table -->
	<version>@VERSION@</version>

	<!-- The description is optional and defaults to the name -->
	<description>TPL_EXTERNALLOGIN_DESCRIPTION</description>
	<files>
		<filename>index.php</filename>
		<filename>login.php</filename>
		<filename>component.php</filename>
		<filename>cpanel.php</filename>
		<filename>error.php</filename>
		<filename>favicon.ico</filename>
		<filename>index.html</filename>
		<filename>template_preview.png</filename>
		<filename>template_thumbnail.png</filename>
		<filename>templateDetails.xml</filename>
		<folder>html</folder>
		<folder>css</folder>
		<folder>images</folder>
	</files>
	<positions>
		<position>menu</position>
		<position>submenu</position>
		<position>toolbar</position>
		<position>title</position>
		<position>status</position>
		<position>icon</position>
		<position>cp_shell</position>
		<position>cpanel</position>
		<position>footer</position>
		<position>login</position>
		<position>debug</position>
	</positions>
	 <languages>
		<language tag="en-GB">language/en-GB/en-GB.tpl_externallogin.ini</language>
		<language tag="en-GB">language/en-GB/en-GB.tpl_externallogin.sys.ini</language>
	</languages>
	<config>
		<fields name="params">
			<fieldset name="basic">
				<field
					name="showSiteName"
					type="list"
					default="0"
					label="TPL_EXTERNALLOGIN_FIELD_SITENAME_LABEL"
					description="TPL_EXTERNALLOGIN_FIELD_SITENAME_DESC">
					<option
						value="0">JDISABLED</option>
					<option
						value="1">JENABLED</option>
				</field>

				<field
					name="textBig"
					type="list"
					default="0"
					label="TPL_EXTERNALLOGIN_FIELD_TEXTBIG_LABEL"
					description="TPL_EXTERNALLOGIN_FIELD_TEXTBIG_DESC">
					<option
						value="0">JDISABLED</option>
					<option
						value="1">JENABLED</option>
				</field>

				<field
					name="highContrast"
					type="list"
					default="0"
					label="TPL_EXTERNALLOGIN_FIELD_CONTRAST_LABEL"
					description="TPL_EXTERNALLOGIN_FIELD_CONTRAST_DESC">
					<option
						value="0">JDISABLED</option>
					<option
						value="1">JENABLED</option>
				</field>

			</fieldset>
		</fields>
	</config>

	<!-- UPDATESERVER DEFINITION -->
	<updateservers>
		<!-- Note: No spaces or linebreaks allowed between the server tags -->
		<server type="collection" priority="1" name="External Login Update Site">https://github.com/downloads/chdemko/joomla-external-login/server.xml</server>
	</updateservers>

</extension>
