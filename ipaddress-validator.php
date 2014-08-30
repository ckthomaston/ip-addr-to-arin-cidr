<?php
/*
    Filename: ipaddress-validator.php
    Rev 2014.0829.2100
    Product: ip-addr-to-arin-cidr
    by ckthomaston@gmail.com
    
    Description:
    
    The IPaddressValidator class will perform several conditionals on the
    specified IP address, to determine if it has a syntax consistent with
    a properly formed IP address.  
    
    For more information about re-using the source code in this product, see
    the other included .php files.  Also, refer to the "ip-addr-to-arin-cidr
    Project UML Class Diagram".
    
    License:

    The license under which this software product is released is GPLv2.  
    
    Disclaimer:
    
    Some of the source code used in this product may have been re-used from
    other sources.
    
    None of the source code in this product, original or derived, has been
    surveyed for vulnerabilities to potential security risks.
    
    Use at your own risk, author is not liable for damages, product is not
    warranted to be useful for anything, copyrights held by their respective
    owners.
*/

// statuses returned by class IPaddressValidator
define ("IPAV_VALID", TRUE);
define ("IPAV_INVALID", FALSE);

class IPaddressValidator
{
    public function ipaddr_validate ($ipaddr_not_validated = NULL) {
        // validate 'ipaddr'
        $subnets = explode ( ".", $ipaddr_not_validated);
        foreach ($subnets as $subnet) {
            if (($subnet < "0") || ($subnet > "255")) {
                return IPAV_INVALID;
            }
        }
        
        // continue validate 'ipaddr'
        if (count($subnets) != 4) {
            return IPAV_INVALID;
        } else {
            foreach ($subnets as $subnet) {
                if (strlen($subnet) > 3) {
                    return IPAV_INVALID;
                }
            }
        }
    
        return IPAV_VALID;
    }
}
?>