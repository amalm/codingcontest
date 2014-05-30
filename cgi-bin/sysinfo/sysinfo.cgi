#! /usr/bin/perl -w

	use strict;
	use File::Find;
	use CGI::Carp qw(fatalsToBrowser);

	print "Content-Type: text/html\n\n";

	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
  print "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
  print "<head>";
  print "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />";
  print "<title>SystemInfo</title>";
  print "<style type=\"text/css\">";
  print "<!--";
  print "body,td,th { font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; }";
  print "body { background-color: #FFFFFF; }";
  print "a:link { color: #000000; text-decoration: underline; }";
  print "a:visited { text-decoration: underline; color: #000000; }";
  print "a:hover { text-decoration: none; color: #000000; }";
  print "a:active { text-decoration: underline; color: #000000; }";
  print ".option {background-color: #ccccff; font-weight: bold; color: #000000; width: 200px; vertical-align: top; text-align: left; }";
  print ".title {background-color: #9999cc; font-weight: bold; color: #000000; vertical-align: top; text-align: left; }";
  print ".value {background-color: #cccccc; color: #000000; vertical-align: top; text-align: left; }";
  print "-->";
  print "</style></head>";

  print "<body>";
  print "<div align=\"center\">";
	print "<table border=\"0\" width=\"800\">";
	print "<tr>";
	print "<td>";
	my $out;
	read(STDIN, my $post, $ENV{'CONTENT_LENGTH'});
	$post =~ s/%2F/\//g;
	my @post = split(/=/,$post);
	my $scriptpath = $post[1];
	if(length($ENV{'CONTENT_LENGTH'})>0){
		if(-e $scriptpath){
			my @check = `perl -cw $scriptpath 2>&1`;
			foreach my $line (@check){
				$out .= "$line<br>";
				}
			}
		else{
			 $out .= "Datei nicht gefunden.";
			}
		}
  print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
	print "<tr>";
  print "<td colspan=\"2\" class=\"title\">Perl-Debugger</td>";
  print "</tr>";
  print "<tr><td class=\"value\"><form action=\"\" method=\"post\"><input type=\"text\" name=\"scriptpath\" value=\"$ENV{'DOCUMENT_ROOT'}\" size=\"60\"><input type=\"submit\" value=\"Script pr&uuml;fen!\"></form></td></tr>";
	print "<tr><td class=\"value\">$out</td></tr>" if(length($out)>0);
  print "</table>";
  print "<br>";

  print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
  print "<tr>";
  print "<td colspan=\"2\" class=\"title\">Server-Informationen</td>";
  print "</tr>";

	open(version_file, "/proc/version");
	my @version_data = <version_file>;
	close (version_file);
	my @kernel_data = split(/\ /,$version_data[0]);
	my $kernel = $kernel_data[2];

  print "<tr><td class=\"option\">Betriebssystem</td><td class=\"value\">$^O (Kernel: $kernel)</td></tr>";
	print "<tr><td class=\"option\">Server-Name</td><td class=\"value\">$ENV{'HTTP_HOST'}</td></tr>";
	print "<tr><td class=\"option\">Server-Ip</td><td class=\"value\">$ENV{'SERVER_ADDR'}</td></tr>";
	print "<tr><td class=\"option\">Server-Zeit</td><td class=\"value\">".localtime."</td></tr>";
	print "<tr><td class=\"option\">Perl-Version</td><td class=\"value\">$]</td></tr>";
  print "</table>";
  print "<br>";
	
  print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
  print "<tr>";
  print "<td colspan=\"2\" class=\"title\">Environment-Variablen</td>";
  print "</tr>";
	foreach(keys %ENV){
		print "<tr><td class=\"option\">$_</td><td class=\"value\">$ENV{$_}</td></tr>";
		}
  print "</table>";
	print "<br>";

	print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
  print "<tr>";
  print "<td colspan=\"2\" class=\"title\">Pfad-Angaben</td>";
  print "</tr>";
  print "<tr><td class=\"option\">perl</td><td class=\"value\">/usr/bin/perl</td></tr>";
	print "<tr><td class=\"option\">grep</td><td class=\"value\">/usr/bin/grep</td></tr>";
	print "<tr><td class=\"option\">date</td><td class=\"value\">/bin/date</td></tr>";
	print "<tr><td class=\"option\">whois</td><td class=\"value\">/usr/bin/whois</td></tr>";
	print "<tr><td class=\"option\">ping</td><td class=\"value\">/bin/ping</td></tr>";
	print "<tr><td class=\"option\">nslookup</td><td class=\"value\">/usr/bin/nslookup</td></tr>";
	print "<tr><td class=\"option\">finger</td><td class=\"value\">/usr/bin/finger</td></tr>";
	print "<tr><td class=\"option\">gzip</td><td class=\"value\">/usr/bin/gzip</td></tr>";
	print "<tr><td class=\"option\">gunzip</td><td class=\"value\">/usr/bin/gunzip</td></tr>";
	print "<tr><td class=\"option\">sendmail</td><td class=\"value\">/usr/sbin/sendmail</td></tr>";
	print "<tr><td class=\"option\">Perl-Module</td><td class=\"value\">";
	foreach(@INC){
		if($_ !~ /^\./){
			print $_."<br>";
			}
		}
	print "</td></tr>";
  print "</table>";
  print "<br>";


	sub trim{
		my $string = shift;
		for($string){
			s/^\s+//;
			s/\s+$//;
			s/\s+/ /;
			}
		return $string;
		}

	my @mime;
	my @split;

	print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
	print "<tr><td class=\"title\" colspan=\"2\">MimeTypes</td></tr>";
	open(mime_file,"/etc/mime.types");
	@mime = <mime_file>;
	foreach my $i (@mime){
		if($i !~ /\#/ and $i !~ /^\s/){
			@split = split(" ",$i);
			print "<tr>\n";
			print "<td class=\"option\">".$split[0]."</td>\n";
			print "<td class=\"value\">";
			shift(@split);
			foreach my $var (@split){
				print $var."<br>";
				}
			print "</td>\n";
			print "</tr>\n";
			}
		}
	close(mime_file);
	print "</table>";
	print "<br>";

	my $modules_count;
	my @modules_name;
	my %modules_version;
	my %modules_check;

	sub get_perl_modules{
		my @version;
		if($File::Find::name =~ /\.pm$/){
			open(modules_file,$File::Find::name)||return;
			while(<modules_file>){
				if(/^ *package +(\S+);/){
					if(!exists $modules_check{$1}){
						push(@modules_name,$1);
						$modules_check{$1}=1;
						$modules_version{$modules_name[$#version]}="&nbsp;";
						}
					}
				if(/^.*?VERSION *= *('|"|\sv)?([\d.]+)((.*);|('|")?;)/i){
					$modules_version{$modules_name[$#version]}=$2;
					last;
					}
				}
			close(modules_file);
		}
	}
	
	find(\&get_perl_modules, @INC);
	$modules_count = @modules_name;

	print "<table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#000000\">";
	print "<tr><td colspan=\"2\" class=\"title\">installierte Perl-Module ($modules_count, \@INC)</td></tr>";
	foreach(sort(@modules_name)){
		print "<tr><td class=\"option\">$_</td><td class=\"value\">$modules_version{$_}</td></tr>";
		}
	print "<table>";
	
	print "</td></tr>";
	print "</table>";
	print "</div>";
  print "</body>";
  print "</html>";

