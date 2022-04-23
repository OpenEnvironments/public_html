--
-- PostgreSQL database dump
--

-- Dumped from database version 12.10 (Ubuntu 12.10-1.pgdg21.04+1)
-- Dumped by pg_dump version 12.10 (Ubuntu 12.10-1.pgdg21.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: core; Type: SCHEMA; Schema: -; Owner: michael
--

CREATE SCHEMA core;


ALTER SCHEMA core OWNER TO michael;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: member; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.member (
    member_id integer NOT NULL,
    member_email character varying(80),
    member_name character varying(80),
    member_password character varying(80),
    member_validation character varying(16),
    member_validated character varying(1),
    member_enabled character varying(1),
    member_created date,
    member_notes character varying(80)
);


ALTER TABLE core.member OWNER TO michael;

--
-- Name: page; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.page (
    page_id character varying(80) NOT NULL,
    page_title character varying(80)
);


ALTER TABLE core.page OWNER TO michael;

--
-- Name: publication; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.publication (
    publication_id character varying(80) NOT NULL,
    publication_name character varying(80) NOT NULL,
    publication_description character varying(256) NOT NULL,
    publication_url character varying(256),
    publisher_publisher_id character varying(80) NOT NULL
);


ALTER TABLE core.publication OWNER TO michael;

--
-- Name: publisher; Type: TABLE; Schema: core; Owner: michael
--

CREATE TABLE core.publisher (
    publisher_id character varying(80) NOT NULL,
    publisher_name character varying(80) NOT NULL,
    publisher_description character varying(256) NOT NULL,
    publisher_image character varying(80),
    publisher_notice character varying(80),
    publisher_url character varying(256)
);


ALTER TABLE core.publisher OWNER TO michael;

--
-- Data for Name: member; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.member (member_id, member_email, member_name, member_password, member_validation, member_validated, member_enabled, member_created, member_notes) FROM stdin;
1	michael.b.bryan@gmail.com	Michael Bryan	b3arclaw	123abc456def	N	Y	2022-04-15	aka Captain Happy
2	ballinvoash@gmail.com	Ballin	bv	A7EF5FEFB1334B56	N	N	2022-04-22	
3	john@bryan.com	Van Vechten	jo	BFA9CF7BE815089B	N	N	2022-04-22	
4	biden@pres.gov	Joe	hh	2161597042EA87FD	Y	N	2022-04-22	
5	e@e.com	Clint	ef	72B03D5E379F2D31	N	N	2022-04-23	
6	suit@suit.com	Edgar	ed	5A30F3BE1CCB4D50	N	N	2022-04-23	
7	wilson@pres.gov	Woodrow	ww	26D96381D14695FB	N	N	2022-04-23	
8	sesame@street.com	Ballin	ss	1E715122F1310279	N	N	2022-04-23	
\.


--
-- Data for Name: page; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.page (page_id, page_title) FROM stdin;
about.php	Open Environments - About Us
cart.php	Open Environments - Shopping Cart
contact.php	Open Environments - Contact Us
cookies-policy.php	Open Environments - Cookies Policy
help.php	Open Environments - Help
index.php	Open Environments
models.php	Open Environments - Models
notifications.php	Open Environments - Notifications
privacy-policy.php	Open Environments - Privacy Policy
profile.php	Open Environments - Profile
publications.php	Open Environments - Publications
publishers.php	Open Environments - Publishers
settings.php	Open Environments - Settings
subjects.php	Open Environments - Subjects
terms.php	Open Environments - Terms of Service
\.


--
-- Data for Name: publication; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.publication (publication_id, publication_name, publication_description, publication_url, publisher_publisher_id) FROM stdin;
blockgroupvoting	U.S. Voting by Census Block Groups	2020 presidential election results projected from voting precincts onto Census block groups.	https://dataverse.harvard.edu/dataset.xhtml?persistentId=doi:10.7910/DVN/NKNWBX	oe
Decennial	Decennial Census		https://www.census.gov/programs-surveys/decennial-census.html	census
ACS	American Community Survey		https://www.census.gov/programs-surveys/acs	census
TIGER	Topologically Integrated Geographic Encoding and Referencing		https://www.census.gov/geographies/mapping-files/time-series/geo/tiger-line-file.html	census
FIPS	Federal Information Processing Series		https://www.census.gov/library/reference/code-lists/ansi.html	nist
EROTP	Economic Report of the President		https://www.whitehouse.gov/cea/economic-report-of-the-president/	bea
SRD	Standard Reference Data		https://www.nist.gov/srd	nist
NAICS	North American Industry Classification System codes		https://www.census.gov/library/reference/code-lists/ansi.html	nist
GNIS	Domestic Names		https://www.usgs.gov/core-science-systems/ngp/board-on-geographic-names	usgs
FRED	Federal Reserve Economic Data		https://fred.stlouisfed.org/	federalreserve
NOWData	NOAA Online Weather Data		https://www.weather.gov/climateservices/nowdatafaq	nws
AIS	Address Information System Viewer		https://postalpro.usps.com/address-quality/ais-viewer	usps
PatEx	Patent Examination Research Dataset 		https://bulkdata.uspto.gov/data/patent/pair/economics/2020/	uspto
PEDS	Patent Examination Data System		https://ped.uspto.gov/peds/#!/	uspto
\.


--
-- Data for Name: publisher; Type: TABLE DATA; Schema: core; Owner: michael
--

COPY core.publisher (publisher_id, publisher_name, publisher_description, publisher_image, publisher_notice, publisher_url) FROM stdin;
oe	Open Environments	Open Environments connects organizations with the technology, data and models to advance their analytical capabilities.	oelogo.png		https://www.openenvironments.com
bea	Bureau of Economic Analysis	The BEA is administered by the White House rather than any one Department.  It publishes official macroeconomic and industry statistics as well as the National Income and Products Accounts (NIPAs)	whitehouse.png		https://www.bea.gov/
census	US Census Bureau	The Census Bureau resides in the Department of Commerce.  It is required by the U.S. constitution to count population to determine congressional seats.	census.png	This uses the Census Data API but is not endorsed by the Census Bureau.	https://www.census.gov/
federalreserve	US Federal Reserve System	Accountable directly to congress, the Federal Reserve administers a system of 12 regional banks printing U.S. currency and setting federal interest rates that guide the market.	federalreserve.png		https://www.federalreserve.gov/
nist	National Institues of Science & Technology	Technically, NIST is a non-regulatory agency within the US Department of Commerce.  It maintains technology standards.	nist.png		https://www.nist.gov/
nws	National Weather Service	The Weather Service uses the other atmospheric measures to forecast weather primarily for public safety and general information.	nws.png		https://www.weather.gov/
usgs	US Geological Survey	The Geological Survey studies the US topologically, including its biology, geography, geology, and hydrology.	usgs.png		https://www.usgs.gov/
usps	US Postal Service	The Postal Service is an independent agency of the executive branch tasked with mail delivery.  As a consequence, it maintains primary data on US addresses, streets and roads.	usps.png		https://www.usps.com/
uspto	US Patent & Trademark Office	The Patent  & Trademark Office administers the US Federal Registry of intellectual property.  This include processing applications for new claims as well as maintenance of the existing registry.	uspto.png		https://www.uspto.gov/
esa	Economics and Statistics Administration	The Economics and Statistics Administration (ESA) is an agency within the United States Department of Commerce (DOC) that analyzes, disseminates, and reports on national economic and demographic data.	esa.png	The ESA has derivative roles to Census and BEA	
\.


--
-- Name: member member_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.member
    ADD CONSTRAINT member_pk PRIMARY KEY (member_id);


--
-- Name: page page_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.page
    ADD CONSTRAINT page_pk PRIMARY KEY (page_id);


--
-- Name: publication publication_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publication
    ADD CONSTRAINT publication_pk PRIMARY KEY (publication_id);


--
-- Name: publisher publisher_pk; Type: CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publisher
    ADD CONSTRAINT publisher_pk PRIMARY KEY (publisher_id);


--
-- Name: publication publication_publisher_fk; Type: FK CONSTRAINT; Schema: core; Owner: michael
--

ALTER TABLE ONLY core.publication
    ADD CONSTRAINT publication_publisher_fk FOREIGN KEY (publisher_publisher_id) REFERENCES core.publisher(publisher_id);


--
-- PostgreSQL database dump complete
--

